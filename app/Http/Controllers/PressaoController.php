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
    	$pressao = Pressao::orderBy('created_at', 'desc')->take($configuracoes->intervalo_grafico)->get();
        return view('pressao.index', compact('pressao'));
    }

    public function coleta(){
        $configuracoes = Configuracoes::find(1)->select('intervalo_grafico')->first();
    	Event::fire(new PedirParaColetarPressao());
    	$pressao = Pressao::orderBy('created_at', 'desc')->take($configuracoes->intervalo_grafico)->get();
        return view('pressao.index', compact('pressao'));
    }
}