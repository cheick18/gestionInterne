<?php

namespace App\Notifications;

use App\Models\Formations;
use App\Models\Inscription;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class paidNotification extends Notification
{
    use Queueable;
    protected $data;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data=$data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $inscrit= Inscription::find($this->data->inscriptions_id);
        $formation= Formations::find($this->data->formations_id);
    
        $downloadLink= storage_path('/app'.$this->data->recu);
    


        return (new MailMessage)
                    ->line('Confirmation de paiment!!!')
                    ->line('Nom: '.$inscrit->Nom)
                    ->line('Prenom '.$inscrit->Prenom)
                    ->line('Module concerné:'.$formation->nom)
                    ->line('Montant versé: '.$this->data->montant)
                    ->line('Date du versement: '.$this->data->created_at)
                    
                    ->when($this->data->montant == null, function ($message) use ($downloadLink) {
                      //  $message->action('Télécharger le reçu', $downloadLink);
                      $message->line('Payment effectué par virement');
                    });


                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
