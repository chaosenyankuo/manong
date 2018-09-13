<?php

namespace App\Http\Controllers;

use App\Yhj;
use Illuminate\Http\Request;

class FuliController extends Controller
{
    //
    public function fuli()
    {
    	$yhj = Yhj::all()->take(8);   	
    	return view('home.fuli.show',compact('yhj'));
    }
}
