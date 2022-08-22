<?php

namespace App\Application\Router;

interface RouteInterface
{
    public static function get(string $uri, string $controller, string $method): void;

    public static function post(string $uri, string $controller, string $method): void;

    public static function list(): array;
}