<?php

namespace App\Livewire;

use App\Models\Inbox;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.guest')]
class Contact extends Component
{

    #[Validate('required')]
    public $first;
    #[Validate('required')]
    public $last;
    #[Validate('required')]
    public $email;
    #[Validate('required')]
    public $message;

    public function store()
    {

        $this->validate();

        Inbox::create([
            'first' => $this->first,
            'last' => $this->last,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
