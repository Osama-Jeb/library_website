<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Contact extends Component
{

    public $first;
    public $last;
    public $email;
    public $message;

    public function store()
    {

    }

    public function render()
    {
        return view('livewire.contact');
    }
}
