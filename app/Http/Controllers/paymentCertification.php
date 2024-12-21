<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Paiement;
use App\Models\User;
use App\Notifications\paidNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class paymentCertification extends Controller
{
    //
    public function payer(Request $request,$id){
    $validated = $request->validate([
        'type' => 'required',
        'montant' => 'required|integer|min:1',
        'recu'=>'required|mimes:txt,pdf,doc,docx,jpg,jpeg,png,gif',
        'type2' => 'required',
        
        
        
      
    ]);
  
    $paiment= new Paiement();
    $ins= Inscription::find($id);
    $files = [];
    
    $files['recu'] = $request->file('recu')->store('public/app/fichiers');
    
   $paiment->user_id=Auth::user()->id;
    if(!isset($request->forme[0])||is_null($request->forme[0])){
    return back()->withInput()->withErrors(['message' => 'Données invalides.']);
   
    }
    $paiment->list_certifs_id=$request->forme[0];
    $paiment->type=$validated['type'];
    $paiment->type2=$validated['type2'];
    $paiment->montant=$validated['montant'];
    $paiment->recu=$files['recu'];
    $paiment->inscriptions_id=$ins->id;

     $paiment->save();
    
     $ins->save();
     
    $useer= User::query('name','admin')->first(); 
    $useer->notify(new paidNotification($paiment)); 

    session()->flash('payment_saved', true); 
 

   
     return view('modalPayment');
}
}
