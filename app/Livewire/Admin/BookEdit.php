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
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

#[Layout('layouts.app')]
class BookEdit extends Component
{
    use WithFileUploads;

    public $editID;

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

    #[Computed()]
    public function categories()
    {
        return Category::all();
    }

    public function mount($id)
    {
        $findBook = Book::find($id);

        $this->editID = $findBook->id;
        $this->editTitle = $findBook->title;
        $this->editAuthor = $findBook->author;
        $this->editDescription = $findBook->description;
        $this->editPages = $findBook->pages;
        $this->editAmount = $findBook->amount;
        $this->editRelease = $findBook->release_date;
        $this->editCover = $findBook->cover;

        foreach ($findBook->categories as $cat) {
            $this->editCategories[] = $cat->id;
        }
    }

    public function update()
    {
        $findBook = Book::find($this->editID);
        $this->validate();

        $data = [
            'title' => $this->editTitle,
            'author' => $this->editAuthor,
            'description' => $this->editDescription,
            'pages' => $this->editPages,
            'amount' => $this->editAmount,
            'release_date' => $this->editRelease,
        ];

        if ($this->editCover && $this->editCover != $findBook->cover) {
            Storage::disk("public")->delete($findBook->cover);
            $data['cover'] = $this->editCover->store('images', 'public');
        }

        $findBook->update($data);

        if ($this->editCategories) {
            $findBook->categories()->sync($this->editCategories);
        }

        alert('Title','Lorem Lorem Lorem', 'success');
    }


    public function delete()
    {
        $findBook = Book::find($this->editID);
        $findBook->delete();
        $this->redirect('/book/admin', true);
    }

    public function render()
    {
        $book = Book::find($this->editID);
        return view('livewire.admin.books.book-edit', [
            'book' => $book
        ]);
    }
}
