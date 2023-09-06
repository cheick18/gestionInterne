@php

$inscrits=App\Models\Inscription::all();



// Créez un tableau pour stocker les étudiants à facturer
$etudiantsAFacturer = [];

foreach ($inscrits as $value) {
    foreach ($value->allformations as $formations) {
        $payments = $formations->allpymentbyinscrit->where('inscriptions_id', $value->id)
            ->where('formations_id', $formations->id)->all();
            $sommePayee =0;
            foreach( $payments as $item)
            $sommePayee = $sommePayee +$item->montant;



      
       
        $prixFormation = $formations->prix;

    
        if ($sommePayee != $prixFormation) {
            
            $resteAPayer = $prixFormation - $sommePayee;

            
            $etudiantsAFacturer[] = [
                'etudiant_nom' => $value->Nom." ".$value->Prenom,
                'formation_nom' => $formations->nom,
                'somme_restante' => $resteAPayer
            ];
        }
    }
}
dd($etudiantsAFacturer );



@endphp