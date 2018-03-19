<?php

namespace App\Listeners;

use App\Events\PedirParaColetarTemperatura;
use App\Events\EnviarAlerta;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Temperatura;
use App\Alertas;
use PHPHtmlParser\Dom;

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
        $dom->loadFromUrl('http://192.168.0.101/?temperatura');
        $dom = $dom->find(".temperatura")->innerHtml;
        $alertas = Alertas::find(1);
        $temperatura = new Temperatura();
        $temperatura->temperatura = $dom;
        $temperatura->save();
        if($temperatura->temperatura > $alertas->limite_maior_pressao){
            Event::fire(new EnviarAlerta("temperatura",$alertas->limite_maior_temperatura,"acima", $temperatura->temperatura));
        }elseif ($temperatura->temperatura < $alertas->limite_menor_pressao) {
            Event::fire(new EnviarAlerta("temperatura",$alertas->limite_menor_temperatura,"abaixo", $temperatura->temperatur));
        }
    }
}