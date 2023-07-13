<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/home', function () {
        return view('dashboard');
    })->name('home');
    
    Route::get('/books', [UserController::class, 'pendingBooks'])->name('mypendingBooks');
    Route::get('/notification', [UserController::class, 'showNotification'])->name('notifications');
    Route::get('/delete/notifications/{id}', [UserController::class, 'deleteNotification']);

});

Route::middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/admin/home', [AdminController::class, 'index']);
    Route::get('/pending/request', [AdminController::class, 'showRequest']);
    Route::get('/admin/schedule', [AdminController::class, 'showSchedule'])->name('admin.schedule');
    Route::get('/admin/borrowed/books', [AdminController::class, 'showBorrowedBooks'])->name('admin.borrowed_books');
    Route::get('/admin/books', [AdminController::class, 'books'])->name('admin.books');
});
