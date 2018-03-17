<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Event;
use App\Events\PedirParaColetarPressao;
use App\Http\Requests;
use App\Pressao;

class PressaoController extends Controller
{
    public function index()
    {   
    	$pressao = Pressao::orderBy('created_at', 'desc')->take(5)->get();
        return view('pressao.index', compact('pressao'));
    }

    public function coleta(){
    	Event::fire(new PedirParaColetarPressao());
    	$pressao = Pressao::orderBy('created_at', 'desc')->take(5)->get();
        return view('pressao.index', compact('pressao'));
    }
}