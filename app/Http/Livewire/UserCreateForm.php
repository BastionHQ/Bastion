<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class UserCreateForm extends Component
{
    public $last_name;

    public $name;

    public $email;

    public $password;

    public $password_confirmation;

    public $set_password = false;

    public $notify_user = false;

    protected array $rules = [
        'last_name' => 'required',
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required_if:set_password,1|confirmed|min:8|nullable',
        'password_confirmation' => 'required_if:set_password,1|nullable',
    ];

    public function updated($field)
    {
        if (in_array($field, ['password', 'password_confirmation'], true)) {
            return $this->validate();
        }

        return $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        User::create(
            [
                'last_name' => $this->last_name,
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->set_password ? $this->password : Str::random(10)
            ]
        );

        if ($this->notify_user) {
            // send email
        }

        $this->emit('closeModals');
        $this->emit('shouldUpdateUserList');
    }

    public function render()
    {
        return view('livewire.user-create-form');
    }
}
