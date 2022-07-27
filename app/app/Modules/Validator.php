<?php

namespace App\Modules;

class Validator
{
    /**
     * @param $inputString
     * @param string $message
     * @return string|null
     */
    public function stringConstraint($inputString, string $message = ''): string|null
    {
        if ($message == '') {
            $message = 'String must be string';
        }
        if (!is_string($inputString)) {
            return $message;
        }
        return null;
    }

    /**
     * @param string $inputString
     * @param int $minLength
     * @param string $message
     * @return string|null
     */
    public function stringMinLengthConstraint(string $inputString, int $minLength, string $message = ''): string|null
    {
        if ($message == '') {
            $message = 'String must be longer than ' . $minLength;
        }
        if (mb_strlen($inputString) < $minLength) {
            return $message;
        }
        return null;
    }

    /**
     * @param string $inputString
     * @param int $maxLength
     * @param string $message
     * @return string|null
     */
    public function stringMaxLengthConstraint(string $inputString, int $maxLength, string $message = ''): string|null
    {
        if ($message == '') {
            $message = 'String must be less than ' . $maxLength;
        }
        if (mb_strlen($inputString) > $maxLength) {
            return $message;
        }
        return null;
    }

    /**
     * @param string $inputString
     * @param int $exactLength
     * @param string $message
     * @return string|null
     */
    public function stringExactLengthConstraint(string $inputString, int $exactLength, string $message = ''): string|null
    {
        if ($message == '') {
            $message = 'String must be exactly ' . $exactLength;
        }
        if (mb_strlen($inputString) !== $exactLength) {
            return $message;
        }
        return null;
    }


    /**
     * @param string $inputString
     * @param string $mustContainString
     * @param string $message
     * @return string|null
     */
    public function stringMustContainConstraint(string $inputString, string $mustContainString, string $message = ''): string|null
    {
        if ($message == '') {
            $message = 'String must contain ' . $mustContainString;
        }
        if (!str_contains($inputString, $mustContainString)) {
            return $message;
        }
        return null;
    }
}