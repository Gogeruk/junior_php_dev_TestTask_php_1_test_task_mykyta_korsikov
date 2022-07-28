<?php

namespace App\Modules;

class View
{
    /**
     * @param string $view
     * @param array $data
     * @return mixed
     */
    public static function display(string $view, array $data = []): mixed
    {
        $view = __DIR__ . '/../Views/' . $view . '.php';
        extract($data);
        return require $view;
    }
}