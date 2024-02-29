<?php

namespace App\Livewire\Admin;

use App\Models\Book;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Admin Books')]
class Books extends Component
{
    use WithPagination;

    #[Url()]
    public $orderTitle = 'asc';

    public function setOrderTitle()
    {
        $this->orderTitle = ($this->orderTitle == 'desc') ? 'asc' : 'desc';
    }

    #[Computed()]
    public function books()
    {
        return Book::orderBy('title', $this->orderTitle)
        ->paginate(7);
    }

    public function render()
    {
        return view('livewire.admin.books');
    }
}
