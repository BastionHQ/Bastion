<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class KeyCreateForm extends Component
{
    public $name;

    public $key;

    public User $user;

    protected array $rules = [
        'name' => 'required',
        'key' => ['required', 'unique:keys'],
    ];

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function submit()
    {
        $this->validate();

        $this->user
            ->keys()
            ->create(
                [
                    'name' => $this->name,
                    'key' => $this->key,
                ]
            );

        $this->emit('closeModals');
        $this->emit('shouldUpdateKeyList');
    }

    public function render()
    {
        return view('livewire.key-create-form');
    }
}
