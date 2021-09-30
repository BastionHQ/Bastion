<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact(['users']));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact(['user']));
    }
}
