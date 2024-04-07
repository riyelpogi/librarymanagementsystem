<?php

namespace App\Http\Livewire;

use App\Models\Books;
use App\Models\PendingBorrow;
use App\Models\Schedule;
use App\Models\User;
use App\Notifications\BookNotification;
use Livewire\Component;

class PendingRequest extends Component
{
    public $requests;

    public $showRequestModal = false;
    public $showRequest;

    public $requestUserName;
    public $requestUserPhoto;
    public $requestBookName;
    public $requestBookCategory;
    public $requestBookAuthor;
    public $requestBookQty;
    public $requestBookPrice;
    public $requestBookDescription;
    public $requestId;
    public $date;
    public function showRequest($id)
    {
        $this->showRequestModal = true;
        $this->showRequest = PendingBorrow::findOrFail($id);
        $this->requestId = $this->showRequest->id;
        $this->requestUserName = $this->showRequest->user->name;
        $this->requestUserPhoto = $this->showRequest->user->profile_photo_url;
        $this->requestBookName = $this->showRequest->book->book_name;
        $this->requestBookCategory = $this->showRequest->book->book_category;
        $this->requestBookAuthor = $this->showRequest->book->book_author;
        $this->requestBookQty = $this->showRequest->book->book_quantity;
        $this->requestBookPrice = $this->showRequest->book->book_price;
        $this->requestBookDescription = $this->showRequest->book->book_description;
        $time = time();
        $time += 86400;
        $this->date = date('Y/m/d', $time);

    }
    public function approve($id)
    {

        $time = time();
        $time += 86400;
        $this->date = date('Y/m/d', $time);
        $requestDetails = PendingBorrow::findOrFail($id);

        Schedule::create([
            'user_id' => $requestDetails->user_id,
            'book_id' => $requestDetails->book_id,
            'date' => $this->date
        ]);

        $book = Books::findOrFail($requestDetails->book_id);

        $user = User::findOrFail($requestDetails->user_id);

        $userNotif = [
            'user_id' => $requestDetails->user_id,
            'user_name' => $requestDetails->user->name,
            'book_id' => $requestDetails->book_id,
            'book_name' => $book->book_name
        ];

        $user->notify(new BookNotification($userNotif));

        $requestDetails->delete();
        $this->reset();
    }

    public function render()
    {
        $this->requests = PendingBorrow::all();
        return view('livewire.pending-request');
    }
}
