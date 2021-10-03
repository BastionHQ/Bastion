<?php

namespace App\Http\Livewire;

use App\Models\Server;
use App\Models\User;
use Livewire\Component;

class ServerUserList extends Component
{
    public Server $server;

    public $readyToLoad = false;

    public function load()
    {
        $this->readyToLoad = true;
    }

    public function mount(Server $server)
    {
        $this->server = $server;
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
        return view('livewire.server-user-list', [
            'users' => $this->readyToLoad
                ? $this->server->users
                : [],
        ]);
    }
}
