<?php

namespace App\Http\Controllers;

use App\Models\Formations;
use Illuminate\Http\Request;

class showFormation extends Controller
{
    //
    public function show(Request $request){
        $formation= Formations::find( $request->id);
        return view('formationDetails',['form'=> $formation]);

    }
}
