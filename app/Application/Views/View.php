<?php

namespace App\Application\Views;

use App\Exceptions\ComponentNotFoundException;
use App\Exceptions\StylesNotFoundException;
use App\Exceptions\ViewNotFoundException;

class View implements ViewInterface
{
    /**
     * @throws ViewNotFoundException
     */
    public static function show(string $view, array $params = []): void
    {
        extract($params);
        $path = realpath(dirname(__DIR__) . '/../..') . "/views/pages/$view.view.php";

        if (!file_exists($path)) {
            self::exception(new ViewNotFoundException("View ($view) not found."));
        }

        include $path;
    }

    public static function exception(\Exception $e): void
    {
        extract([
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        $path = realpath(dirname(__DIR__) . '/../..') . '/views/app/exception.view.php';

        if (!file_exists($path)) {
            echo $e->getMessage() . '<br><hr>';
            echo "<pre>{$e->getTraceAsString()}</pre>";
            return;
        }

        include $path;
    }

    /**
     * @throws ComponentNotFoundException
     */
    public static function component(string $component): void
    {
        $path = realpath(dirname(__DIR__) . '/../..') . "/views/components/$component.component.php";

        if (!file_exists($path)) {
            self::exception(new ComponentNotFoundException("Component ($component) not found."));
        }

        include $path;
    }

    /**
     * @throws StylesNotFoundException
     */
    public static function styles(string $styles): void
    {
        $path = realpath(dirname(__DIR__) . '/../..') . "/styles/$styles.css";

        if (!file_exists($path)) {
            self::exception(new StylesNotFoundException("Styles ($styles) not found."));
        }

        include $path;
    }
}