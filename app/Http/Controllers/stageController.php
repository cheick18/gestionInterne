<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Stage;
use Illuminate\Http\Request;

class stageController extends Controller
{
    //
    public function storeStage(Request $request, $id){
       

        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required',
            'cin'=> 'required',
           
            'specialite' => 'required',
           
            'niveau' => 'required',
            'telephone' => 'required',
             
            'stage'=>'required|mimes:txt,pdf,doc,docx', 
            
            'convention'=>'required|mimes:txt,pdf,doc,docx',
            
            'assurance'=>'required|mimes:txt,pdf,doc,docx',
            
        

        ]);
        $files = [];
        $files['stage'] = $request->file('stage')->store('public/app/fichiers');
$files['convention'] = $request->file('convention')->store('public/app/fichiers');
$files['assurance'] = $request->file('assurance')->store('public/app/fichiers');

        $use=new Inscription();
        $stage= new Stage();
     
        $stage->stage=$files['stage'];
        $stage->convention=$files['convention'];
        $stage->assurance=$files['assurance'];
      
        $stage->save();
        $use->nom=$validated['nom'];
        $use->prenom=$validated['prenom'];
        $use->cin=$validated['cin'];
        $use->specialite=$validated['specialite'];
        $use->niveau=$validated['niveau'];
        $use->telephone=$validated['telephone'];
        $use->user_id=$id;
        $use->lp_id=$stage->id;
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
