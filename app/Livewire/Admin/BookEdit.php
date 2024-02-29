<?php

namespace App\Livewire\Admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class BookEdit extends Component
{
    use WithFileUploads;

    public Book $book;


    #[Validate('required')]
    public $editTitle;
    #[Validate('required')]
    public $editAuthor;
    #[Validate('required')]
    public $editDescription;
    #[Validate('required')]
    public $editPages;
    #[Validate('required')]
    public $editAmount;
    #[Validate('required')]
    public $editRelease;
    #[Validate('required')]
    public $editCover;

    public $editCategories = [];

    public function mount()
    {
        $this->editTitle = $this->book->title;
        $this->editAuthor = $this->book->author;
        $this->editDescription = $this->book->description;
        $this->editPages = $this->book->pages;
        $this->editAmount = $this->book->amount;
        $this->editRelease = $this->book->release_date;
        $this->editCover = $this->book->cover;

        foreach ($this->book->categories as $cat) {
            $this->editCategories[] = $cat->id;
        }
    }

    public function update()
    {
        $this->validate();

        $data = [
            'title' => $this->editTitle,
            'author' => $this->editAuthor,
            'description' => $this->editDescription,
            'pages' => $this->editPages,
            'amount' => $this->editAmount,
            'release_date' => $this->editRelease,
        ];

        if ($this->editCover && $this->editCover != $this->book->cover) {
            Storage::disk("public")->delete($this->book->cover);
            $data['cover'] = $this->editCover->store('images', 'public');
        }

        $this->book->update($data);

        if ($this->editCategories) {
            $this->book->categories()->sync($this->editCategories);
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
