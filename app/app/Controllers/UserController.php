<?php

namespace App\Controllers;

use App\Models\User;
use App\Modules\View;
use App\Modules\ValidateForm;


class UserController
{
    /**
     * @return mixed
     */
    public function new(): mixed
    {
        $errors['email'] = [];
        $errors['password'] = [];
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $role = 1; // director
            if (isset($_POST['manager'])) {
                $role = 2; // manager
            }
            if (isset($_POST['worker'])) {
                $role = 3; // worker
            }

            $validateForm = new ValidateForm();
            $errors = $validateForm->validateForm($email, $password, $errors);
            if (empty($errors['email']) && empty($errors['password'])) {

                // save to db


                return View::display('Home', ['page' => 'HOME']);
            }
        }
        return View::display('New', ['page' => 'NEW', 'errors' => $errors]);
    }


    /**
     * @return mixed
     */
    public function login()
    {
        $errors['email'] = [];
        $errors['password'] = [];
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $validateForm = new ValidateForm();
            $errors = $validateForm->validateForm($email, $password, $errors);
            if (empty($errors['email']) && empty($errors['password'])) {

                // check if user exists


                return View::display('Home', ['page' => 'HOME']);
            }
        }
        return View::display('Login', ['page' => 'LOGIN', 'errors' => $errors]);
    }
}
