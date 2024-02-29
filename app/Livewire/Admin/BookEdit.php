<?php

namespace App\Livewire\Admin;

use App\Models\Book;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class BookEdit extends Component
{
    use WithFileUploads;
    
    public Book $book;

    public $editTitle;
    public $editAuthor;
    public $editDescription;
    public $editPages;
    public $editAmount;
    public $editRelease;
    public $editCover;

    public function mount()
    {
        $this->editTitle = $this->book->title;
        $this->editAuthor = $this->book->author;
        $this->editDescription = $this->book->description;
        $this->editPages = $this->book->pages;
        $this->editAmount = $this->book->amount;
        $this->editRelease = $this->book->release_date;
        $this->editCover = $this->book->cover;
    }

    public function render()
    {
        return view('livewire.admin.book-edit');
    }
}
