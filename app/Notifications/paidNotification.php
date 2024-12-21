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
        if(!empty($this->data->formations_id))
        $formation= Formations::find($this->data->formations_id);
    
       $downloadLink= storage_path('/app'.$this->data->recu);
    

        $message = (new MailMessage)
        ->line('Confirmation de paiement!!!')
        ->line('Nom: ' . $inscrit->Nom)
        ->line('Prenom ' . $inscrit->Prenom);
    
    if (!empty($formation->nom)) {
        $message->line('Module concerné: ' . $formation->nom);
    }
    
       $message ->line('Montant versé: ' . $this->data->montant)
        ->line('Date du versement: ' . $this->data->created_at)
        ->when($this->data->montant == null, function ($message) use ($downloadLink) {
            $message->line('Payment effectué par virement');
        });
    
    return $message;
    
                    
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
