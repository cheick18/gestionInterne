<?php

namespace App\Console\Commands;

use App\Models\Inscription;
use App\Models\User;
use App\Notifications\ListeDesImpayes;
use Illuminate\Console\Command;

class NotificationMensuelle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:mensuel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rapport de paiements du mois';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {/*
        $inscrits= Inscription::all();

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


       $user= User::query('name','admin')->first();
        $user->notify(new ListeDesImpayes($etudiantsAFacturer));
        
       */ return 0;
    }
}
