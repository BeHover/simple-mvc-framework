<?php

namespace App\Application\Router;

trait RouterHelper
{
    protected static function filter(array $routes, string $uri, string $type = 'GET'): array
    {
        return array_filter($routes, function ($route) use ($type, $uri) {
            return $route['type'] === $type && $route['uri'] == $uri;
        });
    }

    protected static function controller(array $route): void
    {
        foreach ($route as $item) {
            $controller = new $item['controller']();
            $method = $item['method'];

            if (!empty($_POST)) {
                $controller->$method($_POST);
            } else {
                $controller->$method();
            }
        }
    }
}