<?php

namespace App\Listeners;

use App\Events\EnviarAlerta;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;
use App\User;
use App\Logs;
use App\Configuracoes;
use Mail;
use Carbon\Carbon;

class EmailAlerta
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EnviarAlerta  $event
     * @return void
     */
    public function handle(EnviarAlerta $event)
    {
        $config = Configuracoes::select('enviar_email')->first();        
        if($config->enviar_email){
            $hora_atual = new Carbon();
            $hora_log = Logs::where('flag_envio','1')->orderBy('id', 'desc')->first();
            $hora_log = $hora_log->created_at;
            $dif = $hora_atual->diffInMinutes($hora_log);
            if($dif > 60){
                $natureza = $event->getNatureza();
                $tipo = $event->getTipo();
                $valorLimite = $event->getValorLimite();
                $atual = $event->getAtual();
                $user = Auth::user();
                Mail::send('emails.emailAlerta', ['user' => $user, 'natureza' => $natureza,'tipo' => $tipo, 'valorLimite' => $valorLimite, 'atual' => $atual], function ($m) use ($user,$natureza,$tipo,$valorLimite, $atual) {
                    $m->to($user->email, $user->nome)->subject('Aviso - MonitorWEB!');
                });
                $log = new Logs();
                $log->acao = "Email enviado, a " .$natureza. " estava " .$tipo. " de " .$valorLimite;
                $log->flag_envio = 1;
                $log->save();
            }else{
                $log = new Logs();
                $log->acao = "Email não enviado, tempo muito curto em relação ao último";
                $log->flag_envio = 0;
                $log->save();
            }
        }
        else{
            $log = new Logs();
            $log->acao = "Email não enviado, usuário configurou o sistema para não enviar e-mails";
            $log->flag_envio = 0;
            $log->save();
        }        
    }
}