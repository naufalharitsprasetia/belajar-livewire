<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Users Page')]
#[Layout('components.layouts.myapp')]
class Users extends Component
{
    public function render()
    {
        return view('livewire.users');
    }
}
