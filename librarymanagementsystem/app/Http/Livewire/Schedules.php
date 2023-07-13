<?php

namespace App\Http\Livewire;

use App\Models\Books;
use App\Models\BorrowedBooks;
use App\Models\PendingBorrow;
use App\Models\Schedule;
use App\Models\User;
use App\Notifications\BookBorrowed;
use Livewire\Component;

class Schedules extends Component
{
    public $schedules;
    public $showScheduleModal = false;
    
    public $UserName;
    public $UserPhoto;
    public $BookName;
    public $BookCategory;
    public $BookAuthor;
    public $BookQty;
    public $BookPrice;
    public $BookDescription;
    public $userId;
    public $bookId;
    public $Id;
    public $show;
    public $date;


    public $date_return;
    protected $rules = [
        'date_return' => ['required']
    ];
    public function showModal($id)
    {
        $this->showScheduleModal = true;
        $this->show = Schedule::findOrFail($id);
        $this->Id = $this->show->id;
        $this->userId = $this->show->user_id;
        $this->bookId = $this->show->book_id;
        $this->UserName = $this->show->user->name;
        $this->UserPhoto = $this->show->user->profile_photo_url;
        $this->BookName = $this->show->book->book_name;
        $this->BookCategory = $this->show->book->book_category;
        $this->BookAuthor = $this->show->book->book_author;
        $this->BookQty = $this->show->book->book_quantity;
        $this->BookPrice = $this->show->book->book_price;
        $this->BookDescription = $this->show->book->book_description;
    }
    
    public function Approve($id)
    {
        $this->validate();
        $time = time();
        $date = date('Y/m/d', $time);
        $borrowed_book = BorrowedBooks::create([
            'user_id' => $this->userId,
            'book_id' => $this->bookId,
            'date_borrowed' => $date,
            'schedule_return' => $this->date_return,
        ]);
        $sched = Schedule::findOrFail($id);
        $sched->delete();
        $book = Books::findOrFail($borrowed_book->book_id);
        $book->book_quantity -= 1;
        $user = User::findOrFail($borrowed_book->user_id);
        $notify = [
            'user_id' => $user->id,
            'user_name' => $user->name,
            'book_id' => $book->id,
            'book_name' => $borrowed_book->book->book_name
        ];

        $user->notify(new BookBorrowed($notify));
        $book->save();
        $this->reset();

    }

    public function render()
    {
        $time = time();
        $this->date = date('Y/m/d', $time);
        $this->schedules = Schedule::orderBy('date')->get();
        return view('livewire.schedules');
    }
}
