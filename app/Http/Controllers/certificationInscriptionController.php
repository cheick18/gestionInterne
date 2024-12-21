<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Inscription;
use App\Models\listCertif;
use App\Models\User;
use App\Notifications\myNotification;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class certificationInscriptionController extends Controller
{
    //
    
    public function storeAtCertif(Request $request){
     try {
            //code...
        
        $validated = $request->validate([
            'nom' => 'required|max:255',
            'prenom' => 'required',
            'cin_'=> 'required',
           
            'specialite' => 'required',
           
            'niveau' => 'required',
            'telephone' => 'required',
          'certification' => 'required',
             
            'cin'=>'required|mimes:txt,pdf,doc,docx', 
            
            
        

        ]);
        $files = [];
        
        $files['cin'] = $request->file('cin')->store('public/app/fichiers');
         
        $use=new Inscription();
       $forma= new Certification();
       $certif=listCertif::find($validated['certification']);
      
     
        $forma->cin=$files['cin'];
        $forma->nom= $certif->nom;
     
        $use->nom=$validated['nom'];
        $use->prenom=$validated['prenom'];
        $use->cin=$validated['cin_'];
       $use->specialite=$validated['specialite'];
        $use->niveau=$validated['niveau'];
        $use->telephone=$validated['telephone'];
        $use->email=$request->email;
        $use->user_id=Auth::user()->id;
      
    
      
       $forma->nomEtudiant=$use->nom;
       $forma->prenomEtudiant=$use->prenom;
      
       $use->list_certifs_id= $certif->id;
       $use->save();
       $forma->save();
       $useer= User::query('name','admin')->first(); 
      $useer->notify(new myNotification($use));
       session()->flash('student_saved', true);
    
       return view('modalSuccess');
  }catch(QueryException $e){
        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'insertion.');

}

    }
}
