<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserServiceImpl implements UserService
{

    function login(string $email, string $password): bool
    {
        return Auth::attempt([
            "email" => $email,
            "password" => $password
        ]);
    }

    function findUserById(string $userId)
    {
        return $todo = User::query()->find($userId);
    }

    function addUser(string $name, string $email, string $password): void
    {
        $user = new User([
            "name" => $name,
            "email" => $email,
            "password" => bcrypt($password)
        ]);
        $user->save();
    }
}
