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
    	$umidade = Umidade::orderBy('created_at', 'desc')->take($configuracoes->intervalo_grafico)->get();
        return view('umidade.index',compact('umidade'));
    }

    public function coleta(){
        $configuracoes = Configuracoes::find(1)->select('intervalo_grafico')->first();
    	Event::fire(new PedirParaColetarUmidade());
    	$umidade = Umidade::orderBy('created_at', 'desc')->take($configuracoes->intervalo_grafico)->get();
        return view('umidade.index',compact('umidade'));
    }
}