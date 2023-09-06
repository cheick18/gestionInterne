<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Lp;
use App\Models\Master;
use App\Models\User;
use App\Notifications\myNotification;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class saveStudentController extends Controller
{
    //
    public function saveStudet(Request $request, $id){
      
      
     
      $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required',
            'cin'=> 'required',
            'specialite' => 'required',
            'niveau' => 'required',
            'telephone' => 'required',
            'photo_profil'=>'required|mimes:txt,pdf,doc,docx,image',
            'cin_rv'=>'required|mimes:txt,pdf,doc,docx',
            'bac'=>'required|mimes:txt,pdf,doc,docx',
            'diplome_bac'=>'required|mimes:txt,pdf,doc,docx',

        ]);
     

        $files['photo_profil'] = $request->file('photo_profil')->store('public/app/fichiers');
$files['cin_rv'] = $request->file('cin_rv')->store('public/app/fichiers');
$files['bac'] = $request->file('bac')->store('public/app/fichiers');
$files['diplome_bac'] = $request->file('diplome_bac')->store('public/app/fichiers');
        $use=new Inscription();
        $licence= new Lp();
     
        $licence->photo_profil=$files['photo_profil'];
        $licence->cin_rv=$files['cin_rv'];
        $licence->bac=$files['bac'];
        $licence->diplome_bac=$files['diplome_bac'];
        $licence->save();
  
      
 $use->nom=$validated['nom'];
        $use->prenom=$validated['prenom'];
        $use->cin=$validated['cin'];
        $use->specialite=$validated['specialite'];
        $use->niveau=$validated['niveau'];
        $use->telephone=$validated['telephone'];
        $use->user_id=$id;
        $use->lp_id=$licence->id;
       $use->save();
       $valid= $request->input('forme',[]);
       foreach ($valid as $key) {
        $use->allformations()->attach($key);
        
       }
       $useer= User::query('name','admin')->first(); 
       $useer->notify(new myNotification($use) );  
        session()->flash('student_saved', true);
    
     return view('modalSuccess');

    }


    
}
