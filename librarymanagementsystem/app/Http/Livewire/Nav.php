<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Nav extends Component
{
    public $unreadNotification;
    public $notifications;
    protected $listeners = ["refreshComponent" => '$refresh'];

    public function read()
    {
        auth()->user()->notifications->markAsRead();
    }

    public function render()
    {
        $this->notifications = auth()->user()->notifications->take(4);

        $this->unreadNotification = count(auth()->user()->unreadNotifications);
        return view('livewire.nav');
    }
}
