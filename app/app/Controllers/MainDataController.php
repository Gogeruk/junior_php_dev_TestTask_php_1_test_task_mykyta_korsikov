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
//            var_dump($_POST);
//            var_dump($_POST['apiData']);
            var_dump(json_decode($_POST['apiData'], true));
            exit();
        }



        return View::display('MainData', ['page' => 'MAIN']);
    }
}