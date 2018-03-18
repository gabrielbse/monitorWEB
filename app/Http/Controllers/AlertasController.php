<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alertas;
use App\Http\Requests;

class AlertasController extends Controller
{
    public function index()
    {   
        return view('alertas.index');
    }

    public function store(Request $request){
    	$configuracoes = Configuracoes::find(1);
    	$configuracoes->intervalo_coleta = $request->intervalo_coleta;
    	$configuracoes->intervalo_relatorio = $request->intervalo_relatorio;
    	$configuracoes->intervalo_grafico = $request->intervalo_grafico;
    	$configuracoes->enviar_email = $request->enviar_email;
    	$configuracoes->save();
    	return view('alertas.index');
    }
}
