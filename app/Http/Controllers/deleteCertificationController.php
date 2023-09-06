<?php

namespace App\Http\Controllers;

use App\Models\listCertif;
use Illuminate\Http\Request;

class deleteCertificationController extends Controller
{
    //
    function delete($id){
        
        $certif= listCertif::find($id);
        $certif->delete();
        return redirect('/dashboard');


    }
}
