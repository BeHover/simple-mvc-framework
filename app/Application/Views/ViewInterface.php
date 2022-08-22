<?php

namespace App\Application\Views;

use Exception;

interface ViewInterface
{
    public static function show(string $view, array $params = []): void;

    public static function exception(Exception $e): void;

    public static function component(string $component): void;

    public static function styles(string $styles): void;
}