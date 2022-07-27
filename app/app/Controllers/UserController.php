<?php

namespace App\Controllers;

use App\Models\User;
use App\Modules\View;
use App\Modules\Validator;


class UserController
{
    public function new()
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

            $validator = new Validator();
            $errors['email'] = $this->validateEmail($validator, $email);
            $errors['password'] = $this->validatePassword($validator, $password);

            $errors['password'] = array_filter($errors['password'], function($a) {return $a !== null;});
            $errors['email'] = array_filter($errors['email'], function($a) {return $a !== null;});
            if (empty($errors['email']) && empty($errors['password'])) {

                // save to db

                return View::display('Home', ['page' => 'HOME']);
            }
        }

        return View::display('New', ['page' => 'NEW', 'errors' => $errors]);
    }



    public function login()
    {
        return View::display('Login', ['page' => 'LOGIN']);
    }

    /**
     * @param Validator $validator
     * @param mixed $email
     * @return array
     */
    public function validateEmail(Validator $validator, mixed $email): array
    {
        $errors[] = $validator->stringConstraint(
            $email,
            'Email must be valid'
        );

        $emailBits = explode('@', $email);
        $errors[] = $validator->stringMinLengthConstraint(
            $emailBits[0],
            3,
            'Email string before @ must be min 3 chars long'
        );
        $errors[] = $validator->stringExactLengthConstraint(
            $emailBits[1] ?? '',
            3,
            'Email string after @ must be exactly 3 chars long'
        );
        return $errors;
    }

    /**
     * @param Validator $validator
     * @param $inputString
     * @return array
     */
    public function validatePassword(Validator $validator, $inputString): array
    {
        $errors[] = $validator->stringMinLengthConstraint(
            $inputString,
            6,
            'Password string must be min 6 chars long'
        );
        return $errors;
    }
}
