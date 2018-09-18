<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class UserConfirmedAccount extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->success()
            ->subject('Your account is ready')
            ->greeting("Dear {$notifiable->name}")
            ->line("Congratulations, your account has been activated.")
            ->line("")
            ->line("<strong>Account Holder Details</strong>")
            ->line("<strong>Username:</strong> {$notifiable->username}")
            ->line("<strong>Email:</strong> {$notifiable->email}")
            ->line("Password: (We wouldn't send that in an email.)")
            ->line("")
            ->action('Edit your profile',url("/account/profile"));
    }
}
