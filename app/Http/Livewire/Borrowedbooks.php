<?php

namespace App\Http\Livewire;

use App\Models\Books;
use App\Models\BorrowedBooks as ModelsBorrowedBooks;
use App\Models\User;
use App\Notifications\BookReturned;
use App\Notifications\BookReturnNotification;
use Livewire\Component;

class Borrowedbooks extends Component
{   

    public $borrowedBooks;
    public $bb;
    public $search;

    public $date_returned;

    public $returnModal = false;
    public $bookId;
    public $book_name;
    public $user_photo;
    public $user_name;
    public $borrowedbooks;
    public $borrowedbooksId;
    public $date_borrowed;
    public $due_date;

    protected $rules = [
        'date_returned' => ['required']
    ];

    public function select($id)
    {
        $this->returnModal = true;
        $this->borrowedbooks = ModelsBorrowedBooks::findOrFail($id);
        $this->user_photo = $this->borrowedbooks->user->profile_photo_url;
        $this->bookId = $this->borrowedbooks->book_id;
        $this->book_name = $this->borrowedbooks->book->book_name;
        $this->user_name = $this->borrowedbooks->user->name;
        $this->borrowedbooksId = $this->borrowedbooks->id;  
        $this->date_borrowed = $this->borrowedbooks->date_borrowed;
        $this->due_date = $this->borrowedbooks->schedule_return;
    }

    public function returned($id)
    {
        $this->validate();
        $borrowed_books = ModelsBorrowedBooks::findOrFail($id);
        $borrowed_books->date_returned = $this->date_returned;
        $borrowed_books->save();
        $book = Books::findOrFail($borrowed_books->book_id);
        $book->book_quantity += 1;
        $book->save();
        $user = User::findOrFail($borrowed_books->user_id);
        $book = Books::findOrFail($borrowed_books->book_id);

        $notify = [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'book_name' => $book->book_name,
            'date_returned' => $this->date_returned
        ];
        
        $user->notify(new BookReturned($notify));
        
        $this->reset();
    }

    public function render()
    {
        if(!empty($this->search)){
            $this->borrowedBooks = ModelsBorrowedBooks::where('book_id', $this->search)
                                                        ->where('date_returned' , null)
                                                        ->get();
        }else{
            $this->borrowedBooks = ModelsBorrowedBooks::where('date_returned' , null)->get();

        }

        $this->bb = ModelsBorrowedBooks::where('date_returned' , null)->get();


        foreach ($this->bb as $value) {

            if ($value->notify == null) {
                $unix = strtotime($value->schedule_return);
                $time = time();
                // dd(abs($unix - $time));
                if (abs($unix - $time) <= 86400) {
                $user = User::findOrFail($value->user_id);
                $book = Books::findOrFail($value->book_id);
                
                $notify = [
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                    'book_name' => $book->book_name,
                    'book_due_date' => $value->schedule_return,

                ];

                $user->notify(new BookReturnNotification($notify));
                $value->notify = "done";
                $value->save();
            }
            }

           

        }
      


        return view('livewire.borrowedbooks');
    }
}
