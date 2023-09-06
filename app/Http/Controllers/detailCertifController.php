<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\listCertif;
use Illuminate\Http\Request;

class detailCertifController extends Controller
{
    //
    public function sendCertif(Request $request){
    
        $certif=listCertif::find($request['id'])->nom;
        $formation=Certification::query('nom', $certif)->first();
        dd($formation->inscrits);

    
      return view('detailCertification',['formation'=>$formation]);
      

    }
}
