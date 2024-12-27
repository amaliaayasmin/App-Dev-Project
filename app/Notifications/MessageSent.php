<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class MessageSent extends Notification
{
    use Queueable;

    protected $message;
    protected $organizer; // Change sender to organizer

    public function __construct($message, $organizer)
    {
        $this->message = $message;
        $this->organizer = $organizer; // Initialize the organizer
    }

    public function via($notifiable)
    {
        return ['database']; // You can also add 'mail' or other channels if needed
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
            'organizer' => $this->organizer, // Include the organizer in the notification data
        ];
    }
}