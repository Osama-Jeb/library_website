<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Users extends Component
{
    use WithPagination;

    #[Url()]
    public $search = '';

    #[Computed()]
    public function users()
    {
        return User::where('name', 'like', "%{$this->search}%")
        ->orWhere('email', 'like', "%{$this->search}%")
        ->paginate(7);
    }


    public function render()
    {
        return view('livewire.admin.users.users');
    }
}
