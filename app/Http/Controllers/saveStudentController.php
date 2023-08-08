<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Lp;
use App\Models\Master;
use App\Models\User;
use App\Notifications\myNotification;
use Illuminate\Http\Request;

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

        $files = [];
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
  
       /* $use= User::find(1); */
       /* $use->notify(new myNotification ); */
 $use->nom=$validated['nom'];
        $use->prenom=$validated['prenom'];
        $use->cin=$validated['cin'];
        $use->specialite=$validated['specialite'];
        $use->niveau=$validated['niveau'];
        $use->telephone=$validated['telephone'];
        $use->user_id=$id;
        $use->lp_id=$licence->id;
       $use->save();
       
        session()->flash('student_saved', true);
    
     return view('modalSuccess');

    }

    function storemaster( Request $request, $id){
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required',
            'cin'=> 'required',
            'specialite' => 'required',
            'niveau' => 'required',
            'telephone' => 'required',
            'photo'=>'required|mimes:txt,pdf,doc,docx,image',
            'cin'=>'required|mimes:txt,pdf,doc,docx',
            'bac'=>'required|mimes:txt,pdf,doc,docx',
            'lp'=>'required|mimes:txt,pdf,doc,docx',
            'attestation'=>'required|mimes:txt,pdf,doc,docx',

        ]);

        $files = [];
        $files['photo'] = $request->file('photo')->store('public/fichiers');
$files['cin'] = $request->file('cin')->store('public/fichiers');
$files['bac'] = $request->file('bac')->store('public/fichiers');
$files['lp'] = $request->file('lp')->store('public/fichiers');
$files['attestation'] = $request->file('attestation')->store('public/fichiers');
        $use=new Inscription();
        $master= new Master();
     
        $master->photo=$files['photo'];
        $master->cin=$files['cin'];
        $master->bac=$files['bac'];
        $master->lp=$files['lp'];
        $master->attestation=$files['attestation'];
        $master->save();
  
       /* $use= User::find(1); */
       /* $use->notify(new myNotification ); */
 $use->nom=$validated['nom'];
        $use->prenom=$validated['prenom'];
        $use->cin=$validated['cin'];
        $use->specialite=$validated['specialite'];
        $use->niveau=$validated['niveau'];
        $use->telephone=$validated['telephone'];
        $use->user_id=$id;
        $use->master_id= $master->id;
       $use->save();
       
        session()->flash('student_saved', true);
    
     return view('modalSuccess');

    }
    function sotrestage(){

    }
    function storeforma(){}
}
