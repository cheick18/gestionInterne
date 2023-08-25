<?php

namespace App\Http\Controllers;

use App\Models\Formations;
use Illuminate\Http\Request;

class chargerdataFormationController extends Controller
{
    //
    function chargerData($id){
        $formations= Formations::find($id);
      
        return view("updateFormation",["formationns"=>$formations]);
    }
}
