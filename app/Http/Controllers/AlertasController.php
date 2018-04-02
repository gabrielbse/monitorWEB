<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alertas;
use App\Http\Requests;

class AlertasController extends Controller
{
    public function index()
    {   
        $alertas = Alertas::find(1);
        return view('alertas.index', compact('alertas'));
    }

    public function store(Request $request){
    	$alertas = Alertas::find(1);
    	$alertas->limite_maior_temperatura = $request->limite_maior_temperatura;
    	$alertas->limite_menor_temperatura = $request->limite_menor_temperatura;
    	$alertas->limite_maior_umidade = $request->limite_maior_umidade;
    	$alertas->limite_menor_umidade = $request->limite_menor_umidade;
        $alertas->limite_maior_pressao = $request->limite_maior_pressao;
        $alertas->limite_menor_pressao = $request->limite_menor_pressao;
        $alertas->limite_maior_altitude = $request->limite_maior_altitude;
        $alertas->limite_menor_altitude = $request->limite_menor_altitude;
    	$alertas->save();
    	$alertas = Alertas::find(1);
        return view('alertas.index', compact('alertas'));
    }
}
