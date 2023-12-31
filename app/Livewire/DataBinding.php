<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class DataBinding extends Component
{

    #[Rule('required|string|min:3')]
    public $name;

    #[Rule('required|email|unique:users')]
    public $email;

    #[Rule('required|min:8')]
    public $password;

    #[Rule('required|min:8|same:password')]
    public $password_confirmation;

    public function createNewUser()
    {
        $this->validate();

        User::create([
            "name" => Str::lower($this->name),
            "email" => Str::lower($this->email),
            "password" => Hash::make($this->password),
        ]);

        $this->reset('name', 'email', 'password', 'password_confirmation');

        return session()->flash('success', 'User Created Successfully');
    }

    public function render()
    {
        $users = User::select('id', 'name')->paginate(6);
        return view('livewire.DataBinding.index', [
            "users" => $users
        ]);
    }
}
