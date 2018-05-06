<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Event;
use App\Events\PedirParaColetarAltitude;
use App\Http\Requests;
use App\Altitude;
use App\Configuracoes;

class AltitudeController extends Controller
{
    public function index()
    {   
        $configuracoes = Configuracoes::find(1)->select('intervalo_grafico')->first();
    	$altitudes = Altitude::orderBy('created_at', 'desc')->take($configuracoes->intervalo_grafico)->get();
        foreach ($altitudes as $altitude) {
            $altitude->date = $altitude->created_at->format('d/m H:i');
        }
        return view('altitude.index',compact('altitudes'));
    }

    public function coleta(){
        $configuracoes = Configuracoes::find(1)->select('intervalo_grafico')->first();
    	Event::fire(new PedirParaColetarAltitude());
    	$altitudes = Altitude::orderBy('created_at', 'desc')->take($configuracoes->intervalo_grafico)->get();
        foreach ($altitudes as $altitude) {
            $altitude->date = $altitude->created_at->format('d/m H:i');
        }
        return view('altitude.index',compact('altitudes'));
    }
}