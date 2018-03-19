<?php

namespace App\Listeners;

use App\Events\PedirParaColetarUmidade;
use App\Events\EnviarAlerta;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Umidade;
use App\Alertas;
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
        $alertas = Alertas::find(1);
        $umidade = new Umidade();
        $umidade->umidade = $dom;
        $umidade->save();
        if($umidade->umidade > $alertas->limite_maior_pressao){
            Event::fire(new EnviarAlerta("umidade",$alertas->limite_maior_umidade,"acima", $umidade->umidade));
        }elseif ($umidade->umidade < $alertas->limite_menor_pressao) {
            Event::fire(new EnviarAlerta("umidade",$alertas->limite_menor_umidade,"abaixo", $umidade->umidade));
        }
    }
}
