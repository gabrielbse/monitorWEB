<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracoes;
use App\Role;
use App\Http\Requests;

class ConfiguracoesController extends Controller
{
    public function index()
    {   
        return view('configuracoes.index');
    }

    public function store(Request $request){
    	$configuracoes = Configuracoes::find(1);
    	$configuracoes->intervalo_coleta = $request->intervalo_coleta;
    	$configuracoes->intervalo_relatorio = $request->intervalo_relatorio;
    	$configuracoes->intervalo_grafico = $request->intervalo_grafico;

        if($request->enviar_email == "true" &&  $configuracoes->enviar_email){
            //mantém true
        }
        elseif($request->enviar_email == "false" &&  $configuracoes->enviar_email==false){
            //mentém false
        }
        elseif($request->enviar_email == "false" && $configuracoes->enviar_email){
            $role = Role::find(1);
            $role->detachPermission(12);
        }
        else{
            $role = Role::find(1);
            $role->attachPermission(12);
        }
        $configuracoes->enviar_email = $request->enviar_email;        
    	$configuracoes->save();
    	return view('configuracoes.index');
    }
}
