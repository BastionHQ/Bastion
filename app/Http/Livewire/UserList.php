<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public $readyToLoad = false;

    public function load()
    {
        $this->readyToLoad = true;
    }

    protected $listeners = ['shouldUpdateUserList'];

    public function shouldUpdateUserList()
    {
        $this->load();
    }

    public function destroy(User $user)
    {
        $user->delete();
    }

    public function render()
    {
        return view('livewire.user-list', [
            'users' => $this->readyToLoad
                ? User::all()
                : [],
        ]);
    }
}
