<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Event;
use App\Events\PedirParaColetarUmidade;
use App\Http\Requests;
use App\Umidade;

class UmidadeController extends Controller
{
    public function index()
    {   
    	$umidade = Umidade::orderBy('created_at', 'desc')->take(5)->get();
        return view('umidade.index',compact('umidade'));
    }

    public function coleta(){
    	Event::fire(new PedirParaColetarUmidade());
    	$umidade = Umidade::orderBy('created_at', 'desc')->take(5)->get();
        return view('umidade.index',compact('umidade'));
    }
}