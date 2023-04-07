<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailVerification extends Notification
{
    use Queueable;

    protected $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
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
            ->from("noreply@jordikeijzers.nl", "Jordi Keijzers")
            ->subject("E-mail verificatie")
            ->greeting("Er is zojuist een account voor u aangemaakt op dit e-mailadres. ")
            ->action("Bevestig e-mailadres", $this->url)
            ->salutation("Met vriendelijke groet,\r\n\r\nJordi Keijzers\r\n\r\nDeze e-mail is automatisch gegenereert. U kunt hier niet op reageren.");
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
            "url" => $this->url
        ];
    }
}
