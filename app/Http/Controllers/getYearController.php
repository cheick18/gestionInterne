<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class getYearController extends Controller
{
    //
    public function getyear(Request $request){
        $y=$request->annee;
        
      
        return view('navtest',["y"=>$y]);

    }
}
