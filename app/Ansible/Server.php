<?php

namespace App\Ansible;

class Server extends Client
{
    public function ping()
    {
        $this->updateHostsFile();

        return $this->playbook
            ->play('playbook/ping.yml');
    }
}
