<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Master;
use App\Models\User;
use App\Notifications\myNotification;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class masterController extends Controller
{
    //
    function storemaster( Request $request, $id){
       try {
        //code...
      
        
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required',
            'cin_'=> 'required',
           
            'specialite' => 'required',
            
            'niveau' => 'required',
            'telephone' => 'required',
                'photo'=>'required|mimes:txt,pdf,doc,docx,jpg,jpeg,png,gif',
            'cin'=>'required|mimes:txt,pdf,doc,docx,jpg,jpeg,png,gif',
            'bac'=>'required|mimes:txt,pdf,doc,docx',
            'lp'=>'required|mimes:txt,pdf,doc,docx',
            'attestation'=>'required|mimes:txt,pdf,doc,docx',
            

        ]);
        
        
    
        $files = [];
        $files['photo'] = $request->file('photo')->store('public/app/fichiers');
$files['cin'] = $request->file('cin')->store('public/app/fichiers');
$files['bac'] = $request->file('bac')->store('public/app/fichiers');
$files['lp'] = $request->file('lp')->store('public/app/fichiers');
$files['attestation'] = $request->file('attestation')->store('public/app/fichiers');

        $use=new Inscription();
        $master= new Master();
     
        $master->photo=$files['photo'];
        $master->cin=$files['cin'];
        $master->bac=$files['bac'];
        $master->lp=$files['lp'];
        $master->attestation=$files['attestation'];
        $master->save();
  
        $useer= User::query('name','admin')->first(); 
     
        $use->nom=$validated['nom'];
        $use->prenom=$validated['prenom'];
        $use->cin=$validated['cin_'];
        $use->specialite=$validated['specialite'];
        $use->niveau=$validated['niveau'];
        $use->telephone=$validated['telephone'];
        $use->telephone=$validated['telephone'];
        $use->email=$request->email;
        $use->user_id=$id;
        $use->master_id= $master->id;
       
        $use->save();
       
        $valid= $request->input('forme',[]);
        foreach ($valid as $key) {
         $use->allformations()->attach($key);
         
        }
        
        $useer->notify(new myNotification($use)); 
       
        session()->flash('student_saved', true);
    
     return view('modalSuccess');
    } catch (QueryException $e) {
        
        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'insertion.');
    }
  
    }
}
