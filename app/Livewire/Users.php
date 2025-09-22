<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class Users extends Component
{
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
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' =>  $this->email,
            'password' => Hash::make($this->password),
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