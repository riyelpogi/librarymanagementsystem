<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingBorrow extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'book_id'];


    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
