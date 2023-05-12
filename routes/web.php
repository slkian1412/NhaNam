<?php

use App\Http\Middleware\Authenticate;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Category;
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
    Route::get('/dashboard', function () {
        $categories = Category::all();
        $books = Book::orderBy('created_at', 'asc')->paginate(15);
        return view('book.index', compact('books', 'categories'));
    })->name('dashboard');
    Route::get('book/manager', [BookController::class, 'show'])->name('manager');
    Route::post('book/manager/add', [BookController::class, 'store'])->name('add');
    Route::get('book/manager/edit/{id}', [BookController::class, 'edit'])->name('edit');
    Route::post('book/manager/update/{id}',[BookController::class, 'update'])->name('update');
    Route::delete('book/manager/delete/{id}',[BookController::class, 'destroy'])->name('delete');
});

Route::get('book', [BookController::class, 'index'])->name('book');
//Route::get('book/manager', [BookController::class, 'show'])->name('manager')->middleware(Authenticate::class);
//Route::post('book/manager/add', [BookController::class, 'store'])->name('add')->middleware(Authenticate::class);
//Route::get('book/manager/edit/{id}', [BookController::class, 'edit'])->name('edit')->middleware(Authenticate::class);
//Route::post('book/manager/update/{id}',[BookController::class, 'update'])->name('update')->middleware(Authenticate::class);
//Route::delete('book/manager/delete/{id}',[BookController::class, 'destroy'])->name('delete')->middleware(Authenticate::class);
Route::get('book/manager/detail/{id}',[BookController::class, 'detail'])->name('detail');
Route::get('book-ajax', [BookController::class, 'pagination'])->name('book-ajax');
Route::get('manager-ajax', [BookController::class, 'paginationManager'])->name('manager-ajax');
Route::get('search-book', [BookController::class, 'searchBook'])->name('search');
