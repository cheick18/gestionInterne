<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Paiement;
use Illuminate\Http\Request;

class DeleteinscritController extends Controller
{
    //
    function DeleteInscrits( $id){

        $pay= Paiement::where('inscriptions_id',$id)->first();
        
        $pay->delete();
        $inscrit= Inscription::find($id);
        
        $inscrit->delete();
        return redirect('/dashboard');
    }
}
