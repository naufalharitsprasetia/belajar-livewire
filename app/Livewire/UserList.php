<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;
    public $query = '';

    #[On('user-created')]
    public function updatedQuery()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }
    public function placeholder()
    {
        return view('livewire.placeholders.skeleton');
    }
    public function render()
    {
        return view('livewire.user-list', [
            'users' => User::latest()
                ->where('name', 'like', "%{$this->query}%")
                ->paginate(7)
        ]);
    }
}