<?php

namespace App\Listeners;

use App\Events\PedirParaColetarAltitude;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Altitude;
use PHPHtmlParser\Dom;

class ColetarAltitude
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
     * @param  PedirParaColetarAltitude  $event
     * @return void
     */
    public function handle(PedirParaColetarAltitude $event)
    {
        $dom = new Dom;
        $dom->loadFromUrl('http://192.168.0.101/?altitude');
        $dom = $dom->find(".altitude")->innerHtml;
        $altitude = new Altitude();
        $altitude->altitude = $dom;
        $altitude->save();
    }
}
