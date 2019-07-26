<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserActive extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @return void
     */
    public function __construct($users, $generatedPass)
    {
        $this->user = $users;
        $this->pass = $generatedPass;
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
    /*email message activated after regestration for login*/
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Activate Account!')
            ->greeting(sprintf('Hi, %s', $this->user->name ))
            ->line('We just noticed that you created a new account. You will need to activate your account to sign in into this account.')
            ->line( 'Your Email : ' .$this->user->email)
            ->line(' Your Password : ' .$this->pass )
            ->action('Activate', route('activate', [$this->user->token])) 
            ->line('Thank you for using our application video editing!');
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
