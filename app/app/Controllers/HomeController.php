<?php

namespace App\Controllers;

use App\Modules\View;

class HomeController
{
    /**
     * @return mixed
     */
    public function index(): mixed
    {
        return View::display('Home', ['page' => 'HOME']);
    }
}
