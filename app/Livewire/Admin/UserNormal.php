<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class UserNormal extends Component
{
    public function render()
    {
        return view('livewire.admin.user-normal');
    }
}
