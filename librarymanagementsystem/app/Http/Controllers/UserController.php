<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\BorrowedBooks;
use App\Models\PendingBorrow;
use App\Models\Schedule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function pendingBooks()
    {
        $books = PendingBorrow::where('user_id', auth()->user()->id)->get();
        $schedule_books = Schedule::where('user_id', auth()->user()->id)->get();
        $borrowed_books = BorrowedBooks::where('user_id', auth()->user()->id)
                                        ->where('date_returned', null)
                                        ->get();
        return view('user.books', ['books' => $books, 'schedules' => $schedule_books, 'borrowed_books' => $borrowed_books]);
    }

    public function deleteNotification($id)
    {
        $notification = auth()->user()->notifications->where('id', $id)->first();
        $notification->delete();

        return back();
    }

    public function showNotification()
    {
       auth()->user()->unreadNotifications->markAsRead();

        return view('user.notification');
    }
}
