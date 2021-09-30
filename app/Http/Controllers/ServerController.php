<?php

namespace App\Http\Controllers;

use App\Models\Server;

class ServerController extends Controller
{
    public function index()
    {
        $servers = Server::all();

        return view('server.index', compact(['servers']));
    }

    public function create()
    {
        return view('server.create');
    }

    public function edit(Server $server)
    {
        return view('server.edit', compact(['server']));
    }

    public function history(Server $server)
    {
        return view('server.history', compact(['server']));
    }

    public function users(Server $server)
    {
        return view('server.users', compact(['server']));
    }
}
