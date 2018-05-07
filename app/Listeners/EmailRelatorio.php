<?php

namespace App\Listeners;

use App\Events\EnviarRelatorio;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use SnappyPDF;
use Carbon\Carbon;
use Mail;
use Auth;
use App\User;
use App\Temperatura;
use App\Pressao;
use App\Umidade;
use App\Altitude;
use App\Logs;

class EmailRelatorio
{

    public function __construct()
    {
        
    }
    
    public function handle(EnviarRelatorio $event)
    {
        try{
            $tempo = new Carbon();        
            $tempo = $tempo->format('d-m-Y H-i-s');

            $tempo_registros = Carbon::yesterday();

            $temperaturas = Temperatura::where('relatado', 'false')->orderBy('created_at', 'desc')->get();
            foreach ($temperaturas as $temperatura) {
                $temperatura->date = $temperatura->created_at->format('d/m H:i');
            }


            $pressaos = Pressao::where('relatado', 'false')->orderBy('created_at', 'desc')->get();
            foreach ($pressaos as $pressao) {
                $pressao->date = $pressao->created_at->format('d/m H:i');
            }


            $altitudes = Altitude::where('relatado', 'false')->orderBy('created_at', 'desc')->get();
            foreach ($altitudes as $altitude) {
                $altitude->date = $altitude->created_at->format('d/m H:i');
            }

            
            $umidades = Umidade::where('relatado', 'false')->orderBy('created_at', 'desc')->get();
            foreach ($umidades as $umidade) {
                $umidade->date = $umidade->created_at->format('d/m H:i');
            }


            $user = User::find(1);
            $pdf = SnappyPDF::loadView('pdfs.relatorioPdf',compact('temperaturas', 'pressaos', 'umidades', 'altitudes'))->setPaper('a4');
            $tempo = new Carbon();
            $tempo = $tempo->format('d-m-Y H-i-s');
            $local = 'app\public\relatorio - ' . $tempo . '.pdf';
            $pdf->save(storage_path($local));
             $temperaturas = Temperatura::where('relatado', 'false')->orderBy('created_at', 'desc')->get();
             $pressaos = Pressao::where('relatado', 'false')->orderBy('created_at', 'desc')->get();
             $altitudes = Altitude::where('relatado', 'false')->orderBy('created_at', 'desc')->get();
             $umidades = Umidade::where('relatado', 'false')->orderBy('created_at', 'desc')->get();
            foreach ($temperaturas as $temperatura) {
                $temperatura->relatado = true;
                $temperatura->save();
            }
            foreach ($pressaos as $pressao) {
                $pressao->relatado = true;
                $pressao->save();
            }
            foreach ($altitudes as $altitude) {
                $altitude->relatado = true;
                $altitude->save();
            }
            foreach ($umidades as $umidade) {
                $umidade->relatado = true;
                $umidade->save();
            }
            $file = storage_path($local);
            if( file_exists($file) ){
                Mail::send('emails.emailRelatorio', ['user' => $user, 'file' => $file], function ($m) use ($user, $file) {
                    $m->to($user->email, $user->nome)->subject('Relatório - MonitorWEB!');
                    $m->attach($file);
                });
                $log = new Logs();
                $log->acao = "Relatório enviado com sucesso";
                $log->flag_envio = 1;
                $log->save();
            }
        }catch(\Exception $e){
            $info = $e->getMessage();
            $log = new Logs();
            $log->acao = "Falha ao enviar relatório: " .$info;
            $log->flag_envio = 1;
            $log->save();
        }        
    }
}
