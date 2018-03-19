<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Event;
use Auth;
use Mail;
use App\Events\EnviarAlerta;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
       /* $natureza = "Temperatura";
        $valorLimite = 35;
        $tipo = "abaixo";
        $atual = 40;
        Event::fire(new EnviarAlerta($natureza,$limite,$tipo, $atual));*/
        return view('home');
    }
}