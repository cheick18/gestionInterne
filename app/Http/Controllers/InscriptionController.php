<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    //
    public function inscrire(){
        $categories= new Categories();
        $categories= Categories::all();

        return view ('formInscription',['categories' => $categories]);
    }
}
