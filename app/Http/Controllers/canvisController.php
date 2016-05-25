<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class canvisController extends Controller
{
    public function obtenirCanvis() {
        $canvis=DB::table('canvis')->orderBy('data', 'desc')->paginate(25);
        // echo "<pre>";
        // var_dump($canvis);
        // echo "</pre><br>";
        return view('canvis')->with('canvis', $canvis);
    }
}
