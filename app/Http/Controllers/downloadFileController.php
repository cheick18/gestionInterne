<?php

namespace App\Http\Controllers;

use App\Models\Forma;
use App\Models\User;
use App\Notifications\testDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class downloadFileController extends Controller
{
    //
    public function file()
    {
        $form = Forma::find(5); 
        
          // Vérifiez si le fichier existe
          if (!Storage::exists($form->cin)) {
            // Gérez le cas où le fichier n'existe pas
            abort(404, 'Le fichier n\'existe pas.');
        }

       
        $cheminFichier = storage_path('app/' . $form->cin);

        $utilisateur = User::findOrFail(1);
        $utilisateur->notify(new testDownload($cheminFichier));
        dd('hello');
        // Redirigez l'utilisateur vers une page de confirmation ou effectuez d'autres actions selon vos besoins.
        return redirect('/dashboard');
        
        
        // Remplacez 5 par l'ID du formulaire que vous souhaitez télécharger
    /*
        if ($form) {
            // Obtenez le chemin complet du fichier sur le système de fichiers local
            $filePath = storage_path('app/' . $form->cin);
    
            // Vérifiez si le fichier existe
            if (file_exists($filePath)) {
                return response()->download($filePath, 'nom_du_fichier_a_afficher.txt');
            } else {
                return "Le fichier n'existe pas.";
            }
        } else {
            return "Le formulaire n'a pas été trouvé.";
        }*/
    }
    
    
}
