<?php

namespace App\Controllers;

use App\Modules\View;

class MainDataController
{
    /**
     * @return mixed
     */
    public function main(): mixed
    {
        return View::display('MainData', ['page' => 'MAIN']);
    }
}