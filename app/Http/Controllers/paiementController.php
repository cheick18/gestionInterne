<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paiementController extends Controller
{
    //
    public function payment(){
        return view('formPaiement');
    }

    public function paymentB(){
        return view('paiB');
    }
}
