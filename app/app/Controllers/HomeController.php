<?php

namespace App\Controllers;

use App\Modules\View;


class HomeController
{
    public function index()
    {
        return View::display('Home', ['page' => 'HOME']);
    }
}
