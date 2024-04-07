<?php

namespace App\Http\Livewire;

use App\Models\Books;
use Livewire\Component;

class AdminBooks extends Component
{
    public $books;
    public $showModal = false;

    public $editqtyModel = false;
    public $book_name;
    public $book_id;
    public $bookQty;

    public $num;
    protected $rules = [
        'num' => "required"
    ];

    public $book;
    public $showBookId;
    public $showBookName;
    public $showBookAuthor;
    public $showBookDescription;
    public $showBookCategory;
    public $showBookPrice;
    public $showBookQty;

    protected $listeners = ['refreshMethod' => 'books'];


    public function editQty($id)
    {
        $this->editqtyModel = true;
        $book = Books::findOrFail($id);
        $this->book_name = $book->book_name;
        $this->book_id = $book->id;
        $this->bookQty = $book->book_quantity;
    }

    public function save()
    {
        $this->validate();
        $book = Books::findOrFail($this->book_id);
        $book->book_quantity += $this->num;
        $book->save();
        $this->reset();
    }


     public function viewBook($id)
     {

        $this->showModal = true;
        $this->book = Books::findOrFail($id);
        $this->showBookName = $this->book->book_name;
        $this->showBookAuthor = $this->book->book_author;
        $this->showBookDescription = $this->book->book_description;
        $this->showBookCategory = $this->book->book_category;
        $this->showBookPrice = $this->book->book_price;
        $this->showBookQty = $this->book->book_quantity;
        $this->showBookId = $this->book->id;

       

     }   




     public function books()
     {
        $this->books = Books::get();

     }

     public function mount()
     {
        $this->books = Books::get();

     }


    public function render()
    {
        return view('livewire.admin-books');
    }
}
