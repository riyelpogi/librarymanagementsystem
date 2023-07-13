<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBooks extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'book_id', 'date_borrowed', 'schedule_return', 'date_returned'];

    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

