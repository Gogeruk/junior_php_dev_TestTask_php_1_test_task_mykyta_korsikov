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
        if (!empty($_POST)) {
            $apiData = json_decode($_POST['apiData'], true);

            // save api data to db

        }



        return View::display('MainData', ['page' => 'MAIN']);
    }
}