<?php

namespace App\Controllers;

use App\Models\MainData;
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

            $email = $apiData[0]['userEmail'];
            unset($apiData[0]);

            $mainData = new MainData();
            foreach ($apiData as $data) {
                $mainData->save($data['title'], $data['body'], $email, $data['button']);
            }
            return View::display('Home', ['page' => 'HOME']);
        }
        return View::display('MainData', ['page' => 'MAIN']);
    }
}