<?php

namespace App\Livewire\Event;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{

    use WithFileUploads;

    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email|min:5|unique:users,email')]
    public $email;

    #[Rule('required|min:8')]
    public $password;

    #[Rule('required|min:8|same:password')]
    public $password_confirmation;

    #[Rule('sometimes|nullable|image|mimes:png,jpg,jpeg|max:1024')]
    public $image;
    public $iterationImage = 1;

    public $userId;

    public function createNewUser()
    {
        $this->validate();
        $fileName = '';
        if ($this->image) {
            $file = $this->image;
            $fileName = Str::slug($this->name) . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images/profile/', $fileName, 'public');
        }

        $user = User::create([
            "name" => Str::lower($this->name),
            "email" => Str::lower($this->email),
            "password" => Hash::make($this->password),
            "image" => $fileName,
        ]);

        $this->reset('name', 'email', 'password', 'password_confirmation', 'image');
        $this->iterationImage++;

        session()->flash('success', 'User Created Successfully');
        $this->dispatch('user-created', $user);
    }

    public function reloadList()
    {
        $this->dispatch('user-created');
    }

    public function render()
    {
        return view('livewire.event.register-form');
    }
}
