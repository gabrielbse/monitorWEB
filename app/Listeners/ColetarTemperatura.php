<?php

namespace App\Listeners;

use App\Events\PedirParaColetarTemperatura;
use App\Events\EnviarAlerta;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Temperatura;
use App\Alertas;
use PHPHtmlParser\Dom;
use App\Logs;
use Carbon\Carbon;

class ColetarTemperatura
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
     * @param  PedirParaColetarTemperatura  $event
     * @return void
     */
    public function handle(PedirParaColetarTemperatura $event)
    {
        $dom = new Dom;
        try{
            //$dom->loadFromUrl('http://192.168.0.101/?temperatura');
            //$dom = $dom->find(".temperatura")->innerHtml;
            $alertas = Alertas::find(1);
            $temperatura = new Temperatura();
            //$temperatura->temperatura = $dom;
            $temperatura->temperatura = rand (15 ,40 );
            $temperatura->relatado = false;
            $temperatura->save();
            //if($temperatura->temperatura > $alertas->limite_maior_temperatura){
            //    Event::fire(new EnviarAlerta("temperatura",$alertas->limite_maior_temperatura,"acima", $temperatura->temperatura));
            //}elseif ($temperatura->temperatura < $alertas->limite_menor_temperatura) {
            //    Event::fire(new EnviarAlerta("temperatura",$alertas->limite_menor_temperatura,"abaixo", $temperatura->temperatura));
            //}
            $log = new Logs();
            $log->acao = "Temperatura medida com sucesso";
            $log->flag_envio = 0;
            $log->save();
        }catch(\Exception $e){
            $log = new Logs();
            $log->acao = "Falha ao medir temperatura";
            $log->flag_envio = 0;
            $log->save();
        }
    }
}