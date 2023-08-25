<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class ajouterCategorie extends Controller
{
    //
    function ajouterCategorie(Request $request){
        $validated = $request->validate([
            'nom' => 'required',
             ]);

     
        $categorie= new Categories();
        $categorie->name_categorie=$validated['nom'];
        $categorie->save();
        return view('allinscrit');


    }
}
