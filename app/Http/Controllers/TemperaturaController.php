<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Event;
use App\Events\PedirParaColetarTemperatura;
use App\Http\Requests;
use App\Temperatura;


class TemperaturaController extends Controller
{
	public function index()
    {   
        $temperatura = Temperatura::orderBy('created_at', 'desc')->take(5)->get();
        return view('temperatura.index', compact('temperatura'));
    }

    public function coleta()
    {
        Event::fire(new PedirParaColetarTemperatura());        
        $temperatura = Temperatura::orderBy('created_at', 'desc')->take(5)->get();
        return view('temperatura.index', compact('temperatura'));
    }
}