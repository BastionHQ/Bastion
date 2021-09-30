<?php

namespace App\Http\Livewire;

use App\Models\Server;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class ServerStatusHistoryList extends Component
{
    use WithPagination;

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

    public function render()
    {
        return view('livewire.server-status-history-list', [
            'history' => $this->readyToLoad
                ? Status::whereServerId($this->server->id)
                    ->latest()
                    ->paginate(20)
                : [],
        ]);
    }
}
