<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    protected $fillable = ['book_category', 'book_name', 'book_author', 'book_quantity', 'book_description', 'book_price'];
}
