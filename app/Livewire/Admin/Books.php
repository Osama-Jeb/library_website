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

    #[Url(as:'s')]
    public $search = '';

    public function setOrderTitle()
    {
        $this->orderTitle = ($this->orderTitle == 'desc') ? 'asc' : 'desc';
    }

    public function resetFilters()
    {
        if ($this->search || $this->orderTitle != 'asc') {
            $this->orderTitle = 'asc';
            $this->search = '';
            $this->resetPage();
            toastr()->info('Filter Reset!', 'Reset');
        }
    }

    #[Computed()]
    public function books()
    {
        return Book::orderBy('title', $this->orderTitle)
        ->where('title', 'like', "%{$this->search}%")
        ->paginate(7);
    }

    public function render()
    {
        return view('livewire.admin.books.books');
    }
}
