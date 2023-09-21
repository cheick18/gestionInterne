<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class telechargerRecu extends Controller
{
    //
    public function telechargerFichier($nomDuFichier){
        $cheminDuFichier = Storage::url($nomDuFichier);
dd( $cheminDuFichier);
/*
        if (Storage::exists($cheminDuFichier)) {
            return response()->download($nomDuFichier);
        } else {
            // Gérer le cas où le fichier n'existe pas
            abort(404);
        }
        */

    }
}
