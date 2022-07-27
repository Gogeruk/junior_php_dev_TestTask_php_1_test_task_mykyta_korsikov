<?php

namespace App;

use Core\Router;

Router::addRoute('/', [Controllers\HomeController::class, 'index']);
Router::addRoute('/new', [Controllers\UserController::class, 'new']);
Router::addRoute('/login', [Controllers\UserController::class, 'login']);
