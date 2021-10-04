<?php

namespace App\Ansible;

use Asm\Ansible\Ansible;
use Illuminate\Filesystem\Filesystem;

class Client
{
    protected $playbook;

    protected $inventoryFile;

    protected $hosts = [];

    public function __construct(array $hosts, $actingAs = 'root')
    {
        $this->inventoryFile = config('bastion.inventory-file');

        $ansible = new Ansible(
            config('bastion.ansible-base'),
            config('bastion.playbook-command'),
            config('bastion.galaxy-command')
        );

        $this->playbook = $ansible
            ->playbook()
            ->inventoryFile($this->inventoryFile)
            ->user($actingAs)
            ->become()
            ->extraVars(
                [
                    'host' => implode(', ', $hosts)
                ]
            )
            ->json();
    }

    public function inventoryFile($path)
    {
        $this->inventoryFile = $path;

        return $this->playbook;
    }

    protected function updateHostsFile()
    {
        (new Filesystem())->put(
            $this->inventoryFile,
            \App\Models\Server::all()
                ->map(function ($item) {
                    return $item->host . ':' . $item->port;
                })
                ->implode(PHP_EOL),
        );
    }
}
