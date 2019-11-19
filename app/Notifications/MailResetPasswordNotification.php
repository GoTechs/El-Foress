<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        $link = url( "admin/password/reset/" . $this->token );

        return ( new MailMessage )
          ->subject( 'Réinitialisez votre mot de passe' )
          ->line( "Quelqu'un a demandé une réinitialisation du mot de passe pour votre compte. Si ce n'était pas vous, veuillez ignorer cet email. Si vous souhaitez continuer, cliquez sur le lien ci-dessous. Ce lien expirera dans 20 minutes. " )
          ->action( 'Réinitialiser le mot de passe', $link );
          //->line( 'Merci !' );
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
