<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;

    protected $name;
    protected $emailAddress;
    protected $subject;
    protected $body;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $emailAddress, $subject, $body)
    {
        $this->name = $name;
        $this->emailAddress = $emailAddress;
        $this->subject = $subject;
        $this->body = $body;
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
                    ->subject('Contact: "' . $this->subject . '" van ' . $this->name . ' <' . $this->emailAddress . '>')
                    ->line("Er is een nieuw bericht verstuurd via het contact formulier.")
                    ->line("Het bericht is van " . $this->name . " <" . $this->emailAddress . ">.")
                    ->line("Het bericht:\n\n")
                    ->line($this->body)
                    ->salutation("Met vriendelijke groeten,\nRobot Jordi");
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
