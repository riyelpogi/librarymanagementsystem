<?php

namespace App\Http\Livewire;

use App\Models\Books as ModelsBooks;
use App\Models\BorrowedBooks;
use App\Models\PendingBorrow;
use App\Models\Schedule;
use Livewire\Component;
use App\Notifications\BookNotification as BookNotification;

class Books extends Component
{
    public $books;
    public $book;
    public $showModal = false;


    public $showBookId;
    public $showBookName;
    public $showBookAuthor;
    public $showBookDescription;
    public $showBookCategory;
    public $showBookPrice;
    public $showBookQty;
    public $disabled;



     public function viewBook($id)
     {

        $this->showModal = true;
        $this->book = ModelsBooks::findOrFail($id);
        $this->showBookName = $this->book->book_name;
        $this->showBookAuthor = $this->book->book_author;
        $this->showBookDescription = $this->book->book_description;
        $this->showBookCategory = $this->book->book_category;
        $this->showBookPrice = $this->book->book_price;
        $this->showBookQty = $this->book->book_quantity;
        $this->showBookId = $this->book->id;

       

     }   

     public function borrow($id){
        $a = PendingBorrow::where('user_id', auth()->user()->id)
                            ->where('book_id', $id)
                            ->get();
                            
        if (count($a) >= 1) {
        session()->flash('message', 'You have an existing request on this book');
            
        }else{
            $b = Schedule::where('user_id', auth()->user()->id)
            ->where('book_id', $id)
            ->get();
            if (count($b) >= 1) {
                session()->flash('message', 'You have an existing schedule on this  book');

            }else{
                $c = BorrowedBooks::where('user_id', auth()->user()->id)
                                    ->where('book_id', $id)
                                    ->where('date_returned', null)
                                    ->get();
                if(count($c) >= 1){
                session()->flash('message', 'You already borrowed this book');

                }else{
                    PendingBorrow::create([
                        'user_id' => auth()->user()->id,
                        'book_id' => $id
                    ]);
                }
                
            }
            
        }

        $this->emit('refreshCount');
        $this->reset();
     }


    public function render()
    {
        $this->books = ModelsBooks::all();

        return view('livewire.books');
    }
}
