<?php

use App\Http\Controllers\ServerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    function () {
        return view('layouts.app');
    }
);

Route::get('/servers', [ServerController::class, 'index'])->name('server.index');
Route::get('/server', [ServerController::class, 'create'])->name('server.create');
Route::get('/server/{server}', [ServerController::class, 'edit'])->name('server.edit');
Route::get('/server/{server}/history', [ServerController::class, 'history'])->name('server.history');
Route::get('/server/{server}/users', [ServerController::class, 'users'])->name('server.users');

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/user/{user}', [UserController::class, 'edit'])->name('user.edit');
