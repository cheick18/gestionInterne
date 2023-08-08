<?php

namespace App\Http\Controllers;

use App\Models\Forma;
use App\Models\Inscription;
use Illuminate\Http\Request;

class saveFormationController extends Controller
{
    //
    public function stroeAtformation(Request $request,$id){
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required',
            'cin'=> 'required',
           
            'specialite' => 'required',
           
            'niveau' => 'required',
            'telephone' => 'required',
             
            'cin'=>'required|mimes:txt,pdf,doc,docx', 
            
            
        

        ]);
        $files = [];
        $files['cin'] = $request->file('cin')->store('public/app/fichiers');

        $use=new Inscription();
        $forma= new Forma();
     
        $forma->cin=$files['cin'];
        $forma->save();
        $use->nom=$validated['nom'];
        $use->prenom=$validated['prenom'];
        $use->cin=$validated['cin'];
        $use->specialite=$validated['specialite'];
        $use->niveau=$validated['niveau'];
        $use->telephone=$validated['telephone'];
        $use->user_id=$id;
        $use->lp_id=$forma->id;
       $use->save();
       
       session()->flash('student_saved', true);
    
       return view('modalSuccess');

    }
}
