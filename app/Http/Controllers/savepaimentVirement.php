<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Paiement;
use App\Models\User;
use App\Notifications\paidNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class savepaimentVirement extends Controller
{
    //
    public function byvirement(Request $request, $id){
      
   
        $validated = $request->validate([
            'type' => 'required',
            'recu'=>'required|mimes:txt,pdf,doc,docx',
            
            
          
        ]);
    

      
        $paiment= new Paiement();
        $ins= Inscription::find($id);

         $files = [];
        
        $files['recu'] = $request->file('recu')->store('public/app/fichiers');
        
    
      
        $paiment->user_id=Auth::user()->id;
        if(!isset($request->forme[0])||is_null($request->forme[0])){
            return back()->withInput()->withErrors(['message' => 'Données invalides.']);
        }
        $paiment->formations_id=$request->forme[0];
        $paiment->type=$validated['type'];
        $paiment->recu=$files['recu'];
        $paiment->inscriptions_id=$ins->id;

         $paiment->save();
        
         $ins->save();
         
        $useer= User::query('name','admin')->first(); 
        $useer->notify(new paidNotification($paiment)); 

         
        

       
         return redirect('/dashboard');
    }

}
