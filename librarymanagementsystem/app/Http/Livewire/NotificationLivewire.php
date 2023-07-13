<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationLivewire extends Component
{
    public $notifications;

    public function remove()
    {
        dd('tanginamo');
      //  $notification = auth()->user()->notifications->where('id', $id);
       // $notification->delete();
    }

    public function asd()
    {
        dd('tanginamo');
    }

    public function render()
    {
        $this->notifications = auth()->user()->notifications;
        return view('livewire.notification-livewire');
    }
}
