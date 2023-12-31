<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;

class FileUpload extends Component
{
    use WithPagination;
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

    public $search;



    public function createNewUser()
    {
        $this->validate();
        $fileName = '';
        if ($this->image) {
            $file = $this->image;
            $fileName = Str::slug($this->name) . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images/profile/', $fileName, 'public');
        }

        User::create([
            "name" => Str::lower($this->name),
            "email" => Str::lower($this->email),
            "password" => Hash::make($this->password),
            "image" => $fileName,
        ]);

        $this->reset('name', 'email', 'password', 'password_confirmation', 'image');
        $this->iterationImage++;

        session()->flash('success', 'User Created Successfully');
    }

    public function deleteUser($userId)
    {
        User::find($userId)->delete();
        session()->flash('successDelete', 'User Deleted Successfully');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::select('id', 'name', 'email', 'image', 'created_at')->where('name', 'like', "%{$this->search}%")->paginate(6);
        return view('livewire.FileUpload.index', ['users' => $users]);
    }
}
