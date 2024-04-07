<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookNotification extends Notification implements ShouldBroadcast
{
    use Queueable;
    public $user;
    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    
     public function toDatabase(object $notifiable)
     {
        return [
            'user_id' => $this->user['user_id'],
            'user_name' => $this->user['user_name'],
            'book_id' => $this->user['book_id'],
            'book_name' => $this->user['book_name'],
            'message' => "Book Id ". $this->user['book_id'] . ", " . $this->user['book_name'] . " has now a schedule." 
        ];
     }

     public function toBroadcast(object $notifiable)
     {
        return new BroadcastMessage([
            'message' => $this->user['user_name'] . ' the book you requested has a schedule.'
        ]);
     }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {

        return [
            'user_id' => $this->user['user_id'],
            'user_name' => $this->user['user_name'],
            'book_id' => $this->user['book_id'],
        ];
    }
}
