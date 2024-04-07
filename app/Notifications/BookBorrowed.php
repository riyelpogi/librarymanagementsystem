<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookBorrowed extends Notification implements ShouldBroadcast
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
            'message' => "You successfully borrowed Book Id " . $this->user['book_id'] . ", " . $this->user['book_name']
        ];
    }

    public function toBroadcast(object $notifiable)
     {
        return new BroadcastMessage([
            'message' => "You successfully borrowed Book Id " . $this->user['book_id'] . ", " . $this->user['book_name']
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
            'book_name' => $this->user['book_name'],
            'message' => "You successfully borrowed Book Id " . $this->user['book_id'] . ", " . $this->user['book_name']
        ];
    }
}
