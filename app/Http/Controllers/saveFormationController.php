<?php

namespace App\Http\Controllers;

use App\Models\Forma;
use App\Models\Inscription;
use App\Models\User;
use App\Notifications\myNotification;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class saveFormationController extends Controller
{
    //

    public function stroeAtformation(Request $request,$id){
    
try{
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required',
            'cin_'=> 'required',
           
            'specialite' => 'required',
           
            'niveau' => 'required',
            'telephone' => 'required',
             
            'cin'=>'required|mimes:txt,pdf,doc,docx,jpg,jpeg,png,gif', 
            
            
        

        ]);
        $files = [];
        
        $files['cin'] = $request->file('cin')->store('public/app/fichiers');

        $use=new Inscription();
        $forma= new Forma();
     
        $forma->cin=$files['cin'];
        $forma->save();
        $use->nom=$validated['nom'];
        $use->prenom=$validated['prenom'];
        $use->cin=$validated['cin_'];
        $use->specialite=$validated['specialite'];
        $use->niveau=$validated['niveau'];
        $use->telephone=$validated['telephone'];
        $use->email=$request->email;
        $use->user_id=$id;
        $use->forma_id=$forma->id;
       $use->save();
       
       $valid= $request->input('forme',[]);
       foreach ($valid as $key) {
        $use->allformations()->attach($key);
        
       }
       $useer= User::query('name','admin')->first(); 
       $useer->notify(new myNotification($use)); 
       session()->flash('student_saved', true);
    
       return view('modalSuccess');

    }catch(QueryException $e){
        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'insertion.');

}
}
}