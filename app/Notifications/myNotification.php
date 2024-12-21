<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class myNotification extends Notification
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
        $user= User::find($this->data->user_id);
       
        return (new MailMessage)
                    ->line('Confirmation inscription')
                    ->line('Nom: '.$this->data->nom)
                    ->line('Prenom: '.$this->data->prenom)
                    ->line('Cin: '.$this->data->cin)
                    ->line('Telephone: '.$this->data->telephone)
                  
                    ->line('Inscrit par: '.$user->name)
                    ->line('Date inscription: '.$this->data->created_at);

                  //  ->action('Notification Action', url('/'));
                    
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
