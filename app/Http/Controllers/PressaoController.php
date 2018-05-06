<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Event;
use App\Events\PedirParaColetarPressao;
use App\Http\Requests;
use App\Pressao;
use App\Configuracoes;

class PressaoController extends Controller
{
    public function index()
    {   
        $configuracoes = Configuracoes::find(1)->select('intervalo_grafico')->first();
    	$pressaos = Pressao::orderBy('created_at', 'desc')->take($configuracoes->intervalo_grafico)->get();
        foreach ($pressaos as $pressao) {
            $pressao->date = $pressao->created_at->format('d/m H:i');
        }
        return view('pressao.index', compact('pressaos'));
    }

    public function coleta(){
        $configuracoes = Configuracoes::find(1)->select('intervalo_grafico')->first();
    	Event::fire(new PedirParaColetarPressao());
    	$pressaos = Pressao::orderBy('created_at', 'desc')->take($configuracoes->intervalo_grafico)->get();
        foreach ($pressaos as $pressao) {
            $pressao->date = $pressao->created_at->format('d/m H:i');
        }
        return view('pressao.index', compact('pressaos'));
    }
}