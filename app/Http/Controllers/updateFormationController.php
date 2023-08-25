<?php

namespace App\Http\Controllers;

use App\Models\Formations as ModelsFormations;
use Formations;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class updateFormationController extends Controller
{
    //
    public function update(Request $request, $id)
    {
      
        $validated = $request->validate([
            'nom' => 'required',
            'prix' => 'required|integer|min:1',
            'formation' => 'required',   
        ]);
      
        $formation = ModelsFormations::find($id);
        if ($formation) {
            $formation->nom=$validated['nom'];
         $formation->prix=$validated['prix'];
         $formation->categories_id=$validated['formation'];
            $formation->save();
            return redirect('/dashboard');
        }

        return back()->with('error', 'Le produit n\'a pas été trouvé.');
    }

}
