<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Inscription;
use App\Models\User;
use App\Notifications\myNotification;
use Illuminate\Http\Request;

class certificationInscriptionController extends Controller
{
    //
    public function stroeAtformation(Request $request,$id){
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required',
            'cin_'=> 'required',
           
            'specialite' => 'required',
           
            'niveau' => 'required',
            'telephone' => 'required',
             
            'cin'=>'required|mimes:txt,pdf,doc,docx', 
            
            
        

        ]);
        $files = [];
        
        $files['cin'] = $request->file('cin')->store('public/app/fichiers');

        $use=new Inscription();
        $forma= new Certification();
     
        $forma->cin=$files['cin'];
        $forma->save();
        $use->nom=$validated['nom'];
        $use->prenom=$validated['prenom'];
        $use->cin=$validated['cin_'];
        $use->specialite=$validated['specialite'];
        $use->niveau=$validated['niveau'];
        $use->telephone=$validated['telephone'];
        $use->user_id=$id;
        $use->lp_id=$forma->id;
       $use->save();
       $valid= $request->input('forme',[]);
       foreach ($valid as $key) {
        $use->allformations()->attach($key);
        
       }
       $useer= User::query('name','admin')->first(); 
       $useer->notify(new myNotification($use)); 
       session()->flash('student_saved', true);
    
       return view('modalSuccess');

    }
}
