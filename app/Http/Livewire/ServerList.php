<?php

namespace App\Http\Livewire;

use App\Models\Server;
use Livewire\Component;

class ServerList extends Component
{
    public $readyToLoad = false;

    public function load()
    {
        $this->readyToLoad = true;
    }

    protected $listeners = ['shouldUpdateServerList'];

    public function shouldUpdateServerList()
    {
        $this->load();
    }

    public function destroy(Server $server)
    {
        $server->delete();
    }

    public function render()
    {
        return view('livewire.server-list', [
            'servers' => $this->readyToLoad
                ? Server::all()
                : [],
        ]);
    }
}
