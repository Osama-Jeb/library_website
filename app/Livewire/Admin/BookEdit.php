<?php

namespace App\Livewire\Admin;

use App\Models\Book;
use App\Models\Category;
use Livewire\Attributes\Computed;
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

    public $editCategories = [];

    public function mount(Book $book)
    {
        $this->editTitle = $book->title;
        $this->editAuthor = $book->author;
        $this->editDescription = $book->description;
        $this->editPages = $book->pages;
        $this->editAmount = $book->amount;
        $this->editRelease = $book->release_date;
        $this->editCover = $book->cover;

        foreach ($book->categories as $cat) {
            $this->editCategories[] = $cat->id;
        }
    }

    #[Computed()]
    public function categories()
    {
        return Category::all();
    }

    public function render()
    {
        return view('livewire.admin.book-edit');
    }
}
