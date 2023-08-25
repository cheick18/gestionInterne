<?php

namespace App\Http\Controllers;

use App\Models\Formations;
use Illuminate\Http\Request;

class detailFormationController extends Controller
{
    //

    function send($id){
        $formation= new Formations();
        $formation= Formations::findOrFail($id);
        return view('detailsFormation',['form'=>$formation]);
    }
}
