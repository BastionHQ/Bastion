<?php

namespace App\Ansible;

class User extends Client
{
    public function add($user)
    {
        $this->updateHostsFile();

        return $this->playbook
            ->play('playbook/user-add.yml')
            ->extraVars(
                [
                    'users' => $user,
                ]
            );
    }

    public function remove($user)
    {
        $this->updateHostsFile();

        return $this->playbook
            ->play('playbook/user-remove.yml')
            ->extraVars(
                [
                    'users' => $user,
                ]
            );
    }
}
