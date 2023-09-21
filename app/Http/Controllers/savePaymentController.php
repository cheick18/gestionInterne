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
            
            
          
        ]);
      
        $paiment= new Paiement();
        $ins= Inscription::find($id);

    
     
      
        $paiment->user_id=Auth::user()->id;
        if(!isset($request->forme[0])||is_null($request->forme[0])){
        return back()->withInput()->withErrors(['message' => 'Données invalides.']);
        dd('null');
        }
        $paiment->formations_id=$request->forme[0];
        $paiment->type=$validated['type'];
        $paiment->montant=$validated['montant'];
        $paiment->inscriptions_id=$ins->id;

         $paiment->save();
        
         $ins->save();
         
        $useer= User::query('name','admin')->first(); 
        $useer->notify(new paidNotification($paiment)); 

         
        

       
         return redirect('/dashboard');
    }

   
}
