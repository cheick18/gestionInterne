<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Inscription;
use App\Models\listCertif;
use Illuminate\Http\Request;

class affectCertifController extends Controller
{
    //
    public function affectCertif(Request $request){
        
        $validated = $request->validate([
            'cin' => 'required', 
            'nom' => 'required',  
            'cinui'=>'required|mimes:txt,pdf,doc,docx,image', 
          
        ]);  
 

    
    
        $inscription= new Inscription();
        $inscription= Inscription::where('cin',$validated['cin'])->first();
      
        if((is_null( $inscription)))
        abort(404);
        
        $certif = Certification::where('nomEtudiant', $inscription->Nom)
        ->where('prenomEtudiant', $inscription->Prenom)
        ->where('nom', listCertif::find($validated['nom'])->nom)
        ->first();
        if((is_null($certif))){
        $inscription->certification_id=$validated['nom'];
         $cert=new Certification();
         $files = [];
         $files['cin_'] = $request->file('cinui')->store('public/app/fichiers');
         
         $cert->nom=listCertif::find($validated['nom'])->nom;
         $cert->cin=$files['cin_'];
         $cert->nomEtudiant= $inscription->Nom;
         $cert->prenomEtudiant= $inscription->Prenom;
         $cert->save();



        }
        return redirect('dashboard');

    }
}
