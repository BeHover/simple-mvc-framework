<?php

namespace App\Application\Router;

use App\Application\Views\View;
use App\Exceptions\RouteNotFoundException;

class Router implements RouterInterface
{
    use RouterHelper;

    public function handle(array $routes): void
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        $filteredRoutes = self::filter($routes, $uri, $requestMethod);

        if (!empty($filteredRoutes)) {
            self::controller($filteredRoutes);
        } else {
            View::exception(new RouteNotFoundException("$requestMethod $uri not found."));
        }
    }

    public function run(string $uri): void
    {
        header('Location: ' . $uri, true);
    }
}