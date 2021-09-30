<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class KeyCreateButton extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.key-create-button');
    }
}
