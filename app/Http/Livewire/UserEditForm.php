<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserEditForm extends Component
{
    public User $user;

    public $password;

    public $password_confirmation;

    public $set_password = false;

    public $notify_user = false;

    public function rules()
    {
        return [
            'user.last_name' => 'required',
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email,' . $this->user->id,
            'password' => 'required_if:set_password,1|confirmed|min:8|nullable',
            'password_confirmation' => 'required_if:set_password,1|nullable',
        ];
    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

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

        $this->user->save();

        if ($this->set_password) {
            $this->user->update(
                [
                    'password' => $this->password
                ]
            );
        }

        if ($this->notify_user) {
            // send email
        }

        return redirect()->to('/users');
    }

    public function render()
    {
        return view('livewire.user-edit-form');
    }
}
