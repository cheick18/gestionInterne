<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class inscrireEtudiantFormation extends Controller
{
    //
    function affectationEtudiant(Request $request){
        $validated = $request->validate([
            'cin' => 'required',
           
            'formation' => 'required',
            
            
          
        ]);
     $inscription= new Inscription();
     $inscription= Inscription::where('cin',$validated['cin'])->first();
     if((is_null( $inscription)))
     abort(404);
     $inscription->allformations()->attach($validated['formation']);
     $inscription->save();
     return view('allinscrit');


    }
}
