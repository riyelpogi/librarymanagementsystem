<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function showRequest()
    {
        return view('admin.pending-request');
    }

    public function showSchedule()
    {
        return view('admin.schedule');
    }

    public function showBorrowedBooks()
    {
        return view('admin.borrowed-books');
    }

    public function books()
    {
        return view('admin.books');
    }

}
