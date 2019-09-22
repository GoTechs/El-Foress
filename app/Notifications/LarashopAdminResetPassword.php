<?php

namespace Larashop\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class LarashopAdminResetPassword extends Notification
{

    public function __construct($token)
    {
        $this->token = $token;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Vous recevez ce courriel car nous avons reçu une demande de réinitialisation du mot de passe.')
            ->action('Réinitialiser mot de passe', route('password.reset.token',['token' => $this->token]))
            ->line('If you did not request a password reset, no further action is required.');
    }
}