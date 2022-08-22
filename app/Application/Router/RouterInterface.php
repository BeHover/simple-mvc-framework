<?php

namespace App\Application\Router;

interface RouterInterface
{
    public function handle(array $routes): void;

    public function run(string $uri): void;
}