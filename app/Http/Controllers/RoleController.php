<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Response;
use Datatables;
use App\Role;
use DB;

class RoleController extends Controller
{

    public function index()
    {
        return view('roles.index');
    }
}
