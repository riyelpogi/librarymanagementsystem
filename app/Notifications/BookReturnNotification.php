<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookReturnNotification extends Notification implements ShouldBroadcast
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
            'book_id' => $this->user['book_id'],
            'book_name' => $this->user['book_name'],
            'book_due_date' => $this->user['book_due_date'],
             'message' => 'You should return Book Id '. $this->user['book_id'] . ', '. $this->user['book_name'] .' by ' . $this->user['book_due_date']. ' to avoid penalty'
            
        ];
    }

    public function toBroadcast(object $notifiable)
    {
        return new BroadcastMessage([
            'message' => "Due date"
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
            'book_id' => $this->user['book_id'],
            'book_name' => $this->user['book_name'],
            'book_due_date' => $this->user['book_due_date'],
            'data' => 'You should return Book Id '. $this->user['book_id'] . ', '. $this->user['book_name'] .'by '. $this->user['book_due_date']. ' to avoid penalty'
        ];
    }
}
