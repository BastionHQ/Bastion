<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class KeyList extends Component
{
    public $readyToLoad = false;

    public User $user;

    protected $listeners = ['shouldUpdateKeyList'];

    public function shouldUpdateKeyList()
    {
        $this->load();
    }

    public function load()
    {
        $this->readyToLoad = true;
    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.key-list', [
            'keys' => $this->readyToLoad
                ? $this->user->keys->all()
                : [],
        ]);
    }
}
