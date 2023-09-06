<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;



class ExportController extends Controller
{
    public function export(){
        $data= Inscription::all();
        $filename = 'export.csv';
        $filepath = storage_path('app/' . $filename);

        $file = fopen($filepath, 'w');
        $columns = ['Cin','Nom', 'Prenom', 'Specialite','Telephone'];
        
        foreach ($data as $row) {
            $rowData = [
                $row->CIN,
                $row->Nom,
                $row->Prenom,
                $row->Niveau,
                $row->Specialite,
                $row->Telephone,
               

            ]; 
            fputcsv($file, $rowData);
        }

        fclose($file);
        return Response::download($filepath, 'export.csv', ['Content-Type' => 'text/csv']);

    }
       
}
