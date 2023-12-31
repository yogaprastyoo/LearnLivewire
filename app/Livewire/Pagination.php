<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Hash;

class Pagination extends Component
{

    use WithPagination;

    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|min:3|unique:users,email')]
    public $email;

    #[Rule('required|min:8')]
    public $password;

    #[Rule('required|min:8|same:password')]
    public $password_confirmation;

    public $search;


    public function createNewUser()
    {
        $this->validate();

        User::create([
            "name" => Str::lower($this->name),
            "email" => Str::lower($this->email),
            "password" => Hash::make($this->password),
        ]);

        $this->reset('name', 'email', 'password', 'password_confirmation');

        session()->flash('success', 'User Created Successfully');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        // $users = User::select('id', 'name')->where('name', 'like', "%{$this->search}%")->paginate(5);
        return view('livewire.Pagination.index', [
            'users' => User::where('name', 'like', "%{$this->search}%")->paginate(5),
        ]);
    }
}
