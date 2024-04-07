<?php

namespace App\Http\Livewire;

use App\Models\Books;
use App\Models\BorrowedBooks;
use App\Models\PendingBorrow;
use App\Models\Schedule;
use Livewire\Component;

class AdminHome extends Component
{   
    public $books;
    public $pendingRequest;
    public $schedules;
    public $borrowedBooks;

    protected $listeners = ['refreshCount' => 'refreshThis'];
    public function refreshThis()
    {
        $this->books = count(Books::get());
        $this->pendingRequest = count(PendingBorrow::get());
        $this->schedules = count(Schedule::get());
        $this->borrowedBooks = count(BorrowedBooks::get());
    }


    public function render()
    {
        
        $this->books = count(Books::get());
        $this->pendingRequest = count(PendingBorrow::get());
        $this->schedules = count(Schedule::get());
        $this->borrowedBooks = count(BorrowedBooks::get());
        return view('livewire.admin-home');
    }
}
