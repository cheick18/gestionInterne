<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class updateInscritController extends Controller
{
    //
    public function updateInscrit(Request $request, $id){
        
    $validated = $request->validate([
        'nom' => 'required|max:255',
        'prenom' => 'required',
        'cin'=> 'required',
        'specialite' => 'required',
        'niveau' => 'required',
        'telephone' => 'required',
      

    ]);
  
    $use= Inscription::find($id);
    $use->nom=$validated['nom'];
    $use->prenom=$validated['prenom'];
    $use->cin=$validated['cin'];
    $use->specialite=$validated['specialite'];
    $use->niveau=$validated['niveau'];
    $use->telephone=$validated['telephone'];
  $use->save();
  return redirect('/dashboard');
}
}
