<?php

namespace App\Listeners;

use Event;
use App\Events\PedirParaColetarPressao;
use App\Events\EnviarAlerta;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Pressao;
use App\Alertas;
use PHPHtmlParser\Dom;
use App\Logs;
use Carbon\Carbon;

class ColetarPressao
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
     * @param  PedirParaColetarPressao  $event
     * @return void
     */
    public function handle(PedirParaColetarPressao $event)
    {
        $dom = new Dom;
        try{
            $dom->loadFromUrl('http://192.168.0.101/?pressao');
            $dom = $dom->find(".pressao")->innerHtml;
            $alertas = Alertas::find(1);
            $pressao = new Pressao();
            $pressao->pressao = $dom;
            $pressao->relatado = false;
            $pressao->save();
            if($pressao->pressao > $alertas->limite_maior_pressao){
                Event::fire(new EnviarAlerta("pressao",$alertas->limite_maior_pressao,"acima", $pressao->pressao));
            }elseif ($pressao->pressao < $alertas->limite_menor_pressao) {
                Event::fire(new EnviarAlerta("pressao",$alertas->limite_menor_pressao,"abaixo", $pressao->pressao));
            }
            $log = new Logs();
            $log->acao = "Pressão medida com sucesso";
            $log->flag_envio = 0;
            $log->save();
        }catch(\Exception $e){
            $info = $e->getMessage();
            $log = new Logs();
            $log->acao = "Falha ao medir pressão: " .$info;
            $log->flag_envio = 0;
            $log->save();
        }        
    }
}