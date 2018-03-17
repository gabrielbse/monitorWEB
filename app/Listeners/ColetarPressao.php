<?php

namespace App\Listeners;

use App\Events\PedirParaColetarPressao;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Pressao;
use PHPHtmlParser\Dom;

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
        $dom->loadFromUrl('http://192.168.0.101/?pressao');
        $dom = $dom->find(".pressao")->innerHtml;
        $pressao = new Pressao();
        $pressao->pressao = $dom;
        $pressao->save();
    }
}
