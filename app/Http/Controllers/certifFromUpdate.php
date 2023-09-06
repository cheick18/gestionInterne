<?php

namespace App\Http\Controllers;

use App\Models\listCertif;
use Illuminate\Http\Request;

class certifFromUpdate extends Controller
{
    //
    public function form(Request $request){
        $certif= listCertif::find($request->id);
       
        return view('updateCertification',['certif'=>$certif]);

    }
}
