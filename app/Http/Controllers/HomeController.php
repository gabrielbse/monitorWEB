<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Temperatura;
use App\Pressao;
use App\Umidade;
use App\Altitude;

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
        $temperatura = Temperatura::select('temperatura')->get()->last();
        if($temperatura == null){
            $temperatura = '-';
        }else{
            $temperatura = $temperatura->temperatura;
        }
        $pressao = Pressao::select('pressao')->get()->last();
        if($pressao == null){
            $pressao = '-';
        }else{
            $pressao = $pressao->pressao;
        }
        $altitude = Altitude::select('altitude')->get()->last();
        if($altitude == null){
            $altitude = '-';
        }else{
            $altitude = $altitude->altitude;
        }
        $umidade = Umidade::select('umidade')->get()->last();
        if($umidade == null){
            $umidade = '-';
        }else{
            $umidade = $umidade->umidade;
        }
        return view('home', compact('temperatura','pressao','umidade','altitude'));
    }
}