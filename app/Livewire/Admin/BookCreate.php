<?php

namespace App\Livewire\Admin;

use App\Models\Book;
use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class BookCreate extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $author;
    #[Validate('required')]
    public $description;
    #[Validate('required')]
    public $pages;
    #[Validate('required')]
    public $amount;
    #[Validate('required')]
    public $release_date;
    #[Validate('required')]
    public $cover;

    public $selectedCat = [];

    public function store()
    {
        // $this->validate();
        dd($this->selectedCat);

        $fileName = $this->cover->store('images', 'public');
        Book::create([
            'title' => $this->title,
            'author' => $this->author,
            'description' => $this->description,
            'pages' => $this->pages,
            'amount' => $this->amount,
            'release_date' => $this->release_date,
            'cover' => $fileName,
        ]);

        $this->reset();
    }



    #[Computed()]
    public function categories()
    {
        return Category::all();
    }

    public function render()
    {
        return view('livewire.admin.book-create');
    }
}
