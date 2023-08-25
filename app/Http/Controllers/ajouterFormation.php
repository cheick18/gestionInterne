<?php

namespace App\Http\Controllers;

use App\Models\Formations;
use Illuminate\Http\Request;

class ajouterFormation extends Controller
{
    //
    function ajouterformation(Request $request){
        $validated = $request->validate([
            'nom' => 'required',
            'prix' => 'required|integer|min:1',
            'formation' => 'required',
            
            
          
        ]);
         $formation=new Formations();
         $formation->nom=$validated['nom'];
         $formation->prix=$validated['prix'];
         $formation->categories_id=$validated['formation'];
         $formation->save();
         return  view('allinscrit');



        

        





    }
}
