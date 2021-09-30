<?php

namespace App\Http\Livewire;

use App\Jobs\PingServerJob;
use App\Models\Server;
use Livewire\Component;

class ServerEditForm extends Component
{
    public Server $server;

    public function rules()
    {
        return [
            'server.title' => 'required',
            'server.host' => 'required|ip|unique:servers,host,' . $this->server->id,
            'server.port' => 'required|numeric',
            'server.user' => 'required',
        ];
    }

    public function mount(Server $server)
    {
        $this->server = $server;
    }

    public function submit()
    {
        $this->validate();

        $this->server->save();

        dispatch(new PingServerJob([$this->server->host]));

        return redirect()->to('/servers');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.server-edit-form');
    }
}
