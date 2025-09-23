<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
    use WithFileUploads;

    #[Validate('image|max:5120')] // 1MB Max
    public $avatar;

    public $titles = "Ini Data Title";
    public $users = '';

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|email:dns|unique:users')]
    public $email = '';

    #[Validate('required|min:3')]
    public $password = '';

    public function createNewUser()
    {
        $validated = $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatar', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' =>  $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $validated['avatar']
        ]);

        session()->flash('success', 'User Baru Telah Ditambahkan!');
        $this->reset();
    }
    public function render()
    {
        $this->users = User::all();
        return view('livewire.users');
    }
}
