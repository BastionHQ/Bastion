<?php

return [

    'ansible-base' => env('BASTION_ANSIBLE_BASE', base_path('resources/ansible')),

    'inventory-file' => env('BASTION_INVENTORY_FILE', base_path('resources/ansible/hosts')),

    'playbook-command' => env('BASTION_PLAYBOOK_COMMAND', '/usr/local/bin/ansible-playbook'),

    'galaxy-command' => env('BASTION_GALAXY_COMMAND', '/usr/local/bin/ansible-galaxy'),
];
