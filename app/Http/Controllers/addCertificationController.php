<?php

namespace App\Http\Controllers;

use App\Models\listCertif;
use Illuminate\Http\Request;

class addCertificationController extends Controller
{
    //
    
    
    public function addCertification(Request $request){
        
        $validated = $request->validate([
            'nom' => 'required',
            'prix' => 'required|integer|min:1',       
          
        ]);
        $certif= new listCertif();
        $certif->nom= $validated['nom'];
        $certif->prix=$validated['prix'];
        $certif->save();
        return redirect('/dashboard');

    }
}
