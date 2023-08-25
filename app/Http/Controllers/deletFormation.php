<?php

namespace App\Http\Controllers;

use App\Models\Formations;
use App\Models\formations_inscription;
use Illuminate\Http\Request;

class deletFormation extends Controller
{
    //
    public function deleteformation($id){
        $form= Formations::find($id);
        $form->allinscrit()->detach();
        $form->delete();
        

        return redirect()->action([InscriptionController::class, 'inscrire']);


    }
}
