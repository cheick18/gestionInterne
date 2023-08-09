<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class paiementController extends Controller
{
    //
    public function payment(){
        $categories= new Categories();
        $categories= Categories::all();
        return view('formPaiement',['categories' => $categories]);
    }

    public function paymentB(){
        return view('paiB');
    }
}
