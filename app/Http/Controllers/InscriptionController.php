<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    //
    public function inscrire(){
        return view ('formInscription');
    }
}
