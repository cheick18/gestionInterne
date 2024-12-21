<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Paiement;
use App\Models\User;
use App\Notifications\paidNotification;
use Formations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class savePaymentController extends Controller
{
    //
    public function paymentAnuelle(Request $request, $id){
      
   
        $validated = $request->validate([
            'type' => 'required',
            'montant' => 'required|integer|min:1',
            'recu'=>'required|mimes:txt,pdf,doc,docx,jpg,jpeg,png,gif',
            'type2' => 'required',
            
            
            
          
        ]);
      
        $paiment= new Paiement();
        $ins= Inscription::find($id);
        
       
        if(!isset($request->forme[0])||is_null($request->forme[0])){
        return back()->withInput()->withErrors(['message' => 'Données invalides.']);
       
        }
        $verif=$ins->allformations->find($request->forme[0]);
        if(is_null($verif))
        return back()->withInput()->withErrors(['message' => 'Etudiant non inscrit à ce module!!!.']);
        $files = [];
        
        $files['recu'] = $request->file('recu')->store('public/app/fichiers');
        
       $paiment->user_id=Auth::user()->id;
        $paiment->formations_id=$request->forme[0];
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
