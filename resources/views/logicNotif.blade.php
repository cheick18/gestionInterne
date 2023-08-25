@php

$inscrits=App\Models\Inscription::all();



// Créez un tableau pour stocker les étudiants à facturer
$etudiantsAFacturer = [];

foreach ($inscrits as $value) {
    foreach ($value->allformations as $formations) {
        $payments = $formations->allpymentbyinscrit->where('inscriptions_id', $value->id)
            ->where('formations_id', $formations->id)->all();
            dd(  $payments[1]->id);

        $sommePayee = $payments->sum();
        dd($sommePayee);
        $prixFormation = $formations->prix;

    
        if ($sommePayee != $prixFormation) {
            
            $resteAPayer = $prixFormation - $sommePayee;

            
            $etudiantsAFacturer[] = [
                'etudiant_id' => $value->id,
                'formation_id' => $formations->id,
                'somme_restante' => $resteAPayer
            ];
        }
    }
}
dd($etudiantsAFacturer );



@endphp