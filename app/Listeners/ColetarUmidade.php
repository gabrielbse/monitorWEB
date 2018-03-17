<?php

namespace App\Listeners;

use App\Events\PedirParaColetarUmidade;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Umidade;
use PHPHtmlParser\Dom;

class ColetarUmidade
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
     * @param  PedirParaColetarUmidade  $event
     * @return void
     */
    public function handle(PedirParaColetarUmidade $event)
    {
        $dom = new Dom;
        $dom->loadFromUrl('http://192.168.0.101/?umidade');
        $dom = $dom->find(".umidade")->innerHtml;
        $umidade = new Umidade();
        $umidade->umidade = $dom;
        $umidade->save();
    }
}
