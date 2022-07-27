<?php

namespace App\Controllers;

use App\Models\User;
use App\Modules\View;


class UserController
{
    public function new()
    {
        return View::display('New', ['page' => 'NEW']);
    }

    public function login()
    {
        return View::display('Login', ['page' => 'LOGIN']);
    }
}
