<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class UserRegisterForm extends Component
{
    use WithFileUploads;

    #[Validate('image|max:3120')] // 1MB Max
    public $avatar;

    public $titles = "Ini Data Title";

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
        $this->reset();

        session()->flash('success', 'User Baru Telah Ditambahkan!');

        $this->dispatch('user-created');
    }
    public function render()
    {
        return view('livewire.user-register-form');
    }
}