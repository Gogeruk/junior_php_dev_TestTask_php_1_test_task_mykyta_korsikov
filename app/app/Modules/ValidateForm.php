<?php

namespace App\Modules;

class ValidateForm
{
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
        $errors[] = $validator->stringMustContainConstraint(
            $inputString,
            '!',
            'Password string must contain "!"'
        );
        return $errors;
    }

    /**
     * @param mixed $email
     * @param mixed $password
     * @param array $errors
     * @return array
     */
    public function validateForm(mixed $email, mixed $password, array $errors): array
    {
        $validator = new Validator();
        $errors['email'] = $this->validateEmail($validator, $email);
        $errors['password'] = $this->validatePassword($validator, $password);

        $errors['password'] = array_filter($errors['password'], function ($a) {
            return $a !== null;
        });
        $errors['email'] = array_filter($errors['email'], function ($a) {
            return $a !== null;
        });
        return $errors;
    }
}