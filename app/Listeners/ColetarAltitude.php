<?php

namespace App\Listeners;

use App\Events\PedirParaColetarAltitude;
use App\Events\EnviarAlerta;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Altitude;
use App\Alertas;
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
        try{
            $dom->loadFromUrl('http://192.168.0.101/?altitude');
            $dom = $dom->find(".altitude")->innerHtml;
            $alertas = Alertas::find(1);
            $altitude = new Altitude();
            $altitude->altitude = $dom;
            $altitude->save();
            if($altitude->altitude > $alertas->limite_maior_altitude){
                Event::fire(new EnviarAlerta("altitude",$alertas->limite_maior_altitude,"acima", $altitude->altitude));
            }elseif ($altitude->altitude < $alertas->limite_menor_altitude) {
                Event::fire(new EnviarAlerta("altitude",$alertas->limite_menor_altitude,"abaixo", $altitude->altitude));
            }
        }catch(\Exception $e){
            
        }
    }
}