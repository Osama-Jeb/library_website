<?php

namespace App\Livewire\Book;

use App\Models\Book;
use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class BookList extends Component
{
    use WithPagination;
    protected $listeners = ['category' => 'updateCategory'];


    #[Url()]
    public $search = '';

    #[Url()]
    public $order = 'asc';

    #[Url()]
    public $category = '';

    public function setOrder($order)
    {
        $this->order = ($order === 'desc') ? 'desc' : 'asc';
    }


    #[On('category')]
    public function updateCategory($category)
    {
        $this->category = $category;
        $this->resetPage();
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->category = '';
        $this->resetPage();
    }

    #[Computed()]
    public function books()
    {
        return Book::orderBy('release_date', $this->order)
            ->when($this->category, function ($query) {
                $query->withCategory($this->category);
            })
            ->search($this->search)
            ->paginate(4);
    }
}
