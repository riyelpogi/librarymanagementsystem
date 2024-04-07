<?php

namespace App\Http\Livewire;

use App\Models\Books;
use Livewire\Component;

class AddBooks extends Component
{
    public $addBooksModel = false;
    public $total_books;
    public $book_category;
    public $book_name;
    public $book_author;
    public $book_quantity;
    public $book_price;
    public $book_description;

    protected function rules()
    {
        return [
            'book_category' => ['required', 'min:3'],
            'book_name' => ['required', 'min:3'],
            'book_author' => ['required', 'min:3'],
            'book_quantity' => ['required'],
            'book_description' => ['required', 'min:10', 'max:2000']
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function storeBooks()
    {
        $this->validate();
        Books::create([
            'book_category' => $this->book_category,
            'book_name' => $this->book_name,
            'book_author' => $this->book_author,
            'book_quantity' => $this->book_quantity,
            'book_description' => $this->book_description,
            'book_price' => $this->book_price
        ]);
        $this->emit('refreshMethod');
        $this->reset();
    }

    public function addBooks()
    {
        $this->addBooksModel = true;

    }


   
    
    public function render()
    {
        $this->total_books = count(Books::all());

        return view('livewire.add-books');
    }
}
