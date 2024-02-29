<?php

namespace App\Livewire\Book;

use App\Models\Book;
use Livewire\Attributes\On;
use Livewire\Component;

class AddBook extends Component
{
    public Book $book;

    protected $listeners = ['fuck' => 'findBook'];

    #[On('fuck')]
    public function findBook()
    {
        dd('fuck');
    }

    public function toggleBook()
    {
        if (auth()->guest()) {
            return $this->redirect(route('login'), true);
        }

        $user = auth()->user();

        if ($user->hasBook($this->book)) {
            $user->own()->detach($this->book);
            return;
        }

        $user->own()->attach($this->book);

    }
}
