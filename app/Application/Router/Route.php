<?php

namespace App\Application\Router;

class Route implements RouteInterface
{
    public static array $routes;

    public static function get(string $uri, string $controller, string $method): void
    {
        self::$routes[] = [
            'uri' => $uri,
            'type' => 'GET',
            'controller' => $controller,
            'method' => $method
        ];
    }

    public static function post(string $uri, string $controller, string $method): void
    {
        self::$routes[] = [
            'uri' => $uri,
            'type' => 'POST',
            'controller' => $controller,
            'method' => $method
        ];
    }

    public static function list(): array
    {
        return self::$routes;
    }
}