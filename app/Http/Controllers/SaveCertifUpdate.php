<?php

namespace App\Http\Controllers;

use App\Models\listCertif;
use Illuminate\Http\Request;

class SaveCertifUpdate extends Controller
{
    //
    public function update(Request $request, $id){
        $validated = $request->validate([
            'nom' => 'required',
            'prix' => 'required|integer|min:1',       
          
        ]);
        $certif= listCertif::find($id);
        $certif->nom= $validated['nom'];
        $certif->prix=$validated['prix'];
        $certif->save();
        return redirect('/dashboard');

    }
}
