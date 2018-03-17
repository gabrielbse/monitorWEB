<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Response;
use Datatables;
use DB;
use Hash;
use Validator;
use Auth;
use App\User;
use PHPHtmlParser\Dom;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function index()
    {   
        return view('users.index');
    }
    
    private function setDataButtons(User $usuario)
    {
      
    }

    

    public function acende(Request $request)
    {

        $dom = new Dom;
        $dom->loadFromUrl('http://192.168.0.101/?ledon');
        
        return view('users.index');

    }

    public function apaga(Request $request)
    {   
        $dom = new Dom;
        $dom->loadFromUrl('http://192.168.0.101/?ledoff');
        return view('users.index');
        
    }
    public function ativar(Request $request){
     
    }

    public function destroy(Request $request){
     
    }
}
