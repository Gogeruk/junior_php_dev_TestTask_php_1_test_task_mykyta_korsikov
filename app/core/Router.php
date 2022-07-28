<?php

namespace Core;

use Core\Config;

class Router
{
    private static array $routes = [];
    private static array $serve = [];

    /**
     * @param string $uri
     * @param array $controllerAction
     * @return void
     */
    public static function addRoute(string $uri, array $controllerAction): void
    {
        static::$routes[$uri] = $controllerAction;
    }

    /**
     * @param string $routerUri
     * @param string $requestUri
     * @return bool
     */
    private static function uriValidation(string $routerUri, string $requestUri): bool
    {
        return $routerUri === $requestUri;
    }

    /**
     * @param string $requestUri
     * @return bool
     */
    public static function dispatch(string $requestUri): bool
    {
        if (static::$serve === []) {
            static::$serve = Config::get('SERVE_DIRS');
        }

        foreach (static::$routes as $path => $route) {
            if (static::uriValidation($path, $requestUri) === true) {
                $class = $route[0];
                $call = $route[1];

                $instance = new $class();
                $instance->$call();
                return true;
            }
        }

        if (static::$serve !== null) {
            foreach (static::$serve as $dir) {
                if (str_starts_with($requestUri, "/" . $dir . "/") === true) {
                    return false;
                }
            }
        }

        http_response_code(404);
        return true;
    }
}
