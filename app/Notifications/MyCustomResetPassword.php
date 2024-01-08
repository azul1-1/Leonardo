<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Notifications\ResetPasswordNotification;

 

class MyCustomResetPassword extends Notification
{
    use Queueable;
    public $token;
    

    

    

    /**
     * Create a new notification instance.
     */
     
    public function __construct($token)
    {
        
      $this->token = $token;
        //
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }
    
    


    /**
     * Get the mail representation of the notification.
     */
   public function toMail($notifiable)
{
      $url = url(route('password.reset', $this->token, false));

   return (new MailMessage)
       ->view('mails.reset',['url' => $url])
       ->action('Reset Password', $url);
       
}
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}