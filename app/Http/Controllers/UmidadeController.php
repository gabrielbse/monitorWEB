<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Event;
use App\Events\PedirParaColetarUmidade;
use App\Http\Requests;
use App\Umidade;
use App\Configuracoes;

class UmidadeController extends Controller
{
    public function index()
    {   
        $configuracoes = Configuracoes::find(1)->select('intervalo_grafico')->first();
    	$umidades = Umidade::orderBy('created_at', 'desc')->take($configuracoes->intervalo_grafico)->get();
        foreach ($umidades as $umidade) {
            $umidade->date = $umidade->created_at->format('d/m H:i');
        }
        return view('umidade.index',compact('umidades'));
    }

    public function coleta(){
        $configuracoes = Configuracoes::find(1)->select('intervalo_grafico')->first();
    	Event::fire(new PedirParaColetarUmidade());
    	$umidades = Umidade::orderBy('created_at', 'desc')->take($configuracoes->intervalo_grafico)->get();
        foreach ($umidades as $umidade) {
            $umidade->date = $umidade->created_at->format('d/m H:i');
        }
        return view('umidade.index',compact('umidades'));
    }
}