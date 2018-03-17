<?php

namespace App\Listeners;

use App\Events\PedirParaColetarTemperatura;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Temperatura;
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
        $temperatura = new Temperatura();
        $temperatura->temperatura = $dom;
        $temperatura->save();
    }
}
