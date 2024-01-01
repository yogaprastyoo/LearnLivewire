<?php

namespace App\Livewire\Event;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{

    use WithPagination;

    public $search;

    #[On('user-created')]
    public function updatingList($user = null)
    {
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function placeholder()
    {
        return view('livewire.Event.includes.placeholder');
    }

    public function render()
    {
        return view('livewire.Event.user-list', [
            'users' => User::where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")
                ->paginate(4),
        ]);
    }
}
