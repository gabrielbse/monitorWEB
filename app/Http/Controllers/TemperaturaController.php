<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Event;
use App\Events\PedirParaColetarTemperatura;
use App\Http\Requests;
use App\Temperatura;
use App\Configuracoes;

class TemperaturaController extends Controller
{
	public function index()
    {   
        $configuracoes = Configuracoes::find(1)->select('intervalo_grafico')->first();
        $temperaturas = Temperatura::orderBy('created_at', 'desc')->take($configuracoes->intervalo_grafico)->get();
        foreach ($temperaturas as $temperatura) {
            $temperatura->date = $temperatura->created_at->format('d/m H:i');
        }
        return view('temperatura.index', compact('temperaturas'));
    }

    public function coleta(){
        $configuracoes = Configuracoes::find(1)->select('intervalo_grafico')->first();
        Event::fire(new PedirParaColetarTemperatura());
        $temperaturas = Temperatura::orderBy('created_at', 'desc')->take($configuracoes->intervalo_grafico)->get();
        foreach ($temperaturas as $temperatura) {
            $temperatura->date = $temperatura->created_at->format('d/m H:i');
        }
        return view('temperatura.index', compact('temperaturas'));
    }
}