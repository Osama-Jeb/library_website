<?php

namespace App\Livewire\Books;

use App\Models\Book;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.guest')]
class Collection extends Component
{

    protected $listeners = ['remove-collection' => 'removeBook'];

    #[On('fuck')]
    public function removeBook($id)
    {
        $book = Book::find($id);
        $user = auth()->user();

        $user->own()->detach($book);

        toastr()->error('Book Removed From Collection!', 'Removed');

    }

    public function ownedBooks()
    {
        $user = auth()->user();

        return $user->own;
    }



    public function render()
    {
        return view('livewire.books.collection');
    }
}
