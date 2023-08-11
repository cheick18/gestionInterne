<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Master;
use Illuminate\Http\Request;

class masterController extends Controller
{
    //
    function storemaster( Request $request, $id){
       
        
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required',
            'cin_'=> 'required',
           
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
  
       /* $use= User::find(1); */
       /* $use->notify(new myNotification ); */
       
        $use->nom=$validated['nom'];
        $use->prenom=$validated['prenom'];
        $use->cin=$validated['cin_'];
        $use->specialite=$validated['specialite'];
        $use->niveau=$validated['niveau'];
        $use->telephone=$validated['telephone'];
        $use->user_id=$id;
        $use->master_id= $master->id;
       
        $use->save();
        $valid= $request->input('forme',[]);
        foreach ($valid as $key) {
         $use->allformations()->attach($key);
         # code...
        }
        
        session()->flash('student_saved', true);
    
     return view('modalSuccess');

    }
}
