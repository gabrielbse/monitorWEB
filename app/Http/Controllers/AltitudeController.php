<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Event;
use App\Events\PedirParaColetarAltitude;
use App\Http\Requests;
use App\Altitude;

class AltitudeController extends Controller
{
    public function index()
    {   
    	$altitude = Altitude::orderBy('created_at', 'desc')->take(5)->get();
        return view('altitude.index',compact('altitude'));
    }

    public function coleta(){
    	Event::fire(new PedirParaColetarAltitude());
    	$altitude = Altitude::orderBy('created_at', 'desc')->take(5)->get();
        return view('altitude.index',compact('altitude'));
    }

}