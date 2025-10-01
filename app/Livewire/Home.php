<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('HOME Page')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.home');
    }
}