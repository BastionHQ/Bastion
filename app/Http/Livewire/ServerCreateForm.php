<?php

namespace App\Http\Livewire;

use App\Jobs\PingServerJob;
use App\Models\Server;
use Livewire\Component;

class ServerCreateForm extends Component
{
    public $title;
    public $host;
    public $port;
    public $user;

    protected array $rules = [
        'title' => 'required',
        'host' => 'required|ip|unique:servers',
        'port' => 'required|numeric',
        'user' => 'required',
    ];

    public function submit()
    {
        $this->validate();

        Server::create(
            [
                'title' => $this->title,
                'host' => $this->host,
                'port' => $this->port,
                'user' => $this->user,
            ]
        );

        dispatch(new PingServerJob([$this->host]));

        $this->emit('closeModals');
        $this->emit('shouldUpdateServerList');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.server-create-form');
    }
}
