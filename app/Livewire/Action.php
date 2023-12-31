<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Action extends Component
{
    public function handleClick()
    {
        dd("This is action");
    }

    public function createNewUser()
    {
        User::create([
            "name" => "Testing",
            "email" => "tesing@tes.com",
            "password" => Hash::make("testing")
        ]);
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.Action.action', [
            "users" => $users,
        ]);
    }
}
