<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Aboutt Page')]
class About extends Component
{
    public function render()
    {
        return <<<'HTML'
        <div class="text-center mt-30">
            <h1 class="text-3xl font-semibold">Home Page</h1>
        </div>
        HTML;
    }
}