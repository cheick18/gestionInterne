<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Paiement;
use App\Models\User;
use Illuminate\Http\Request;

class savePaymentController extends Controller
{
    //
    public function paymentAnuelle(Request $request){
        $validated = $request->validate([
            'type' => 'required',
            'montant' => 'required|integer|min:1',
            
            
          
        ]);
        $paiment= new Paiement();
        $inscrit=new Inscription();
        $inscrit=Inscription::find(1);
        $inscrit->paiement_id=1;
        $inscrit->save();
        $paiment->user_id=1;
        $paiment->inscription_id=1;
        $paiment->type=$validated['type'];
        $paiment->montant=$validated['montant'];
         $paiment->save();
       
      dd('heloo');
    }

    public function paymentb(Request $request){
        $validated = $request->validate([
            'montant' => 'required|integer|min:1',
              
        ]);
        dd($validated);
        /* verifier le type de paiement 
        $paiment= new Paiement();
        $inscrit=new Inscription();
        $inscrit=Inscription::find(1);
        $inscrit->paiement_id=1;
        $inscrit->save();
        $paiment->user_id=1;
        $paiment->inscription_id=1;
        $paiment->montant=$validated['montant'];
         $paiment->save();
         */

    }
}
