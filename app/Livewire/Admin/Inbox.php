<?php

namespace App\Livewire\Admin;

use App\Models\Inbox as ModelsInbox;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class Inbox extends Component
{
    use WithPagination;

    #[Computed()]
    public function inboxes()
    {
        return ModelsInbox::latest()->paginate(8);
    }

    public function delete($id)
    {
        $message = ModelsInbox::find($id);
        $message->delete();
        toastr()->error('Message Deleted!', 'Deleted');
    }

    public function render()
    {
        return view('livewire.admin.inbox');
    }
}
