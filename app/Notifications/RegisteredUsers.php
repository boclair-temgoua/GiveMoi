<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegisteredUsers extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return (new MailMessage)
            ->success()
            ->subject('Veuillez confirmer votre compte')
            ->greeting("Cher {$notifiable->name}")
            ->line("Merci de vous être enregistré sur <strong>" . config('app.name') . '</strong>.')
            ->line("&nbsp;")
            ->line('Avant de pouvoir vous connecter à votre compte Merci de confirmer votre adresse e-mail.')
            ->action('Confirmer votre compte', url("/confirm/{$notifiable->id}/" . urlencode($notifiable->confirmation_token)))
            ->line("Merci d'utiliser le site <strong>" . config('app.name') . '</strong>.');
        //->line("<strong>Account Holder Details</strong>")
        //->line("Fullname: {$notifiable->fullname}")
        //->line("Email: {$notifiable->email}")
        //->line("&nbsp;")
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
