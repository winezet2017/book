<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::post('/books/{book}/borrow', [BookController::class, 'borrowBook'])->name('books.borrowBook');
    Route::post('/books/{book}/return', [BookController::class, 'returnBook'])->name('books.returnBook');
});
require __DIR__ . '/auth.php';
// book route
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/borrow', [BookController::class, 'borrow'])->name('books.borrow');
// Route::get('/books/{id}', [BookController::class, 'index'])->name('books.index');
// Route::post('/books/{book}/rent', [BookController::class, 'rent'])->name('books.rent');

//* Categories Route
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');