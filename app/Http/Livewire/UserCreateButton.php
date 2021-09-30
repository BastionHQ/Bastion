<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserCreateButton extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user-create-button');
    }
}
