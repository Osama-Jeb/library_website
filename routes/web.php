<?php

use App\Http\Controllers\admin\AdminBookController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserCollection;
use App\Livewire\Admin\BookCreate;
use App\Livewire\Admin\BookEdit;
use App\Livewire\Admin\Books;
use App\Livewire\Admin\Inbox;
use App\Livewire\Admin\UserNormal;
use App\Livewire\Admin\Users\UserEdit;
use App\Livewire\Admin\Users\Users;
use App\Livewire\Book\BookShow;
use App\Livewire\Books\Collection;
use App\Livewire\Contact;
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

Route::get('/', HomeController::class)->name('home.index');

Route::get('/books', BookController::class)->name('book.index');

Route::get('/books/{book:title}', BookShow::class)->name('book.show');


Route::get('/about', function () {
    return view('frontend.others.about');
})->name('about.index');


Route::get('/contact', Contact::class)->name('contact.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {
    Route::get('/dash/admin', function () {
        return view('admin.dash.dash');
    })->name('dash.admin');

    Route::get('/profile', function () {
        return view('profile.show');
    })->name('profile.show');

    Route::get('/inbox/admin', Inbox::class)->name('inbox.admin');

    Route::get('/book/admin', Books::class)->name('books.admin');
    Route::get('/book/create', BookCreate::class)->name('books.create');
    Route::get('/books/edit/{id}', BookEdit::class)->name('books.edit');

    Route::get('/users/admin', Users::class)->name('users.admin');
    Route::get('/users/edit/{id}', UserEdit::class)->name('users.edit');

    Route::get('/user/profile', UserNormal::class)->name('user.index');

    Route::get('/collection', Collection::class)->name('collection.index');
});
