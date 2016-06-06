<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class canvisController extends Controller
{
	//redirecciona a la vista canvis amb els canvis ordenats per data de manera descendent
    public function obtenirCanvis() {
        $canvis=DB::table('canvis')->orderBy('data', 'desc')->paginate(25);
        return view('canvis')->with('canvis', $canvis);
    }
}
