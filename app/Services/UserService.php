<?php

namespace App\Services;

interface UserService
{
    function login(string $email, string $password): bool;

    function findUserById(string $userId);

    function addUser(string $name, string $email, string $password): void;
}
