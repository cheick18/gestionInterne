<?php

namespace App\Console;

use App\Models\Inscription;
use App\Models\User;
use App\Notifications\ListeDesImpayes;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        \App\Console\Commands\NotificationMensuelle::class,
    ];
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
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
            info('hello le monde');
        })->everyFiveMinutes();


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
