<?php

namespace App\Livewire\Book;

use App\Models\Book;
use App\Models\Comment;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.guest')]
class BookShow extends Component
{
    public Book $book;

    #[Validate('required|min:3')]
    public $comment;

    public function postComment()
    {
        $this->validate();

        $user = auth()->user();
        Comment::create([
            'user_id' => $user->id,
            'book_id' => $this->book->id,
            'comment' => $this->comment,
        ]);

        $this->reset('comment');
        toastr()->success('Comment Added!', 'Success');
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);

        $comment->delete();
        toastr()->error('Comment Deleted!', 'Deleted');
    }

}
