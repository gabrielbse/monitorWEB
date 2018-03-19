<?php

namespace App\Listeners;

use App\Events\PedirParaColetarPressao;
use App\Events\EnviarAlerta;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Pressao;
use App\Alertas;
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
        $alertas = Alertas::find(1);
        $pressao = new Pressao();
        $pressao->pressao = $dom;
        $pressao->save();
        if($pressao->pressao > $alertas->limite_maior_pressao){
            Event::fire(new EnviarAlerta("pressao",$alertas->limite_maior_pressao,"acima", $pressao->pressao));
        }elseif ($pressao->pressao < $alertas->limite_menor_pressao) {
            Event::fire(new EnviarAlerta("pressao",$alertas->limite_menor_pressao,"abaixo", $pressao->pressao));
        }
    }
}
