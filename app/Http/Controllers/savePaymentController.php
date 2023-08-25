<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Paiement;
use App\Models\User;
use Formations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class savePaymentController extends Controller
{
    //
    public function paymentAnuelle(Request $request, $id){
      
   
        $validated = $request->validate([
            'type' => 'required',
            'montant' => 'required|integer|min:1',
            
            
          
        ]);
      
        $paiment= new Paiement();
        $ins= Inscription::find($id);

    
     
      
        $paiment->user_id=Auth::user()->id;
        $paiment->formations_id=$request->forme[0];
        $paiment->type=$validated['type'];
        $paiment->montant=$validated['montant'];
        $paiment->inscriptions_id=$ins->id;

         $paiment->save();
        
         $ins->save();
         

         
        

       
         return redirect('/dashboard');
    }

   
}
