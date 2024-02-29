<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class UserEdit extends Component
{

    public $editID;

    public function mount($id)
    {
        $user = User::find($id);
        $this->editID = $user->id;
    }
    public function render()
    {
        $user = User::find($this->editID);

        return view('livewire.admin.users.user-edit', [
            'user' => $user,
        ]);
    }
}
