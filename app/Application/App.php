<?php

namespace App\Application;

use App\Application\Router\Route;
use App\Application\Router\Router;
use App\Application\Views\View;
use App\Exceptions\ComponentNotFoundException;
use App\Exceptions\RouteNotFoundException;
use App\Exceptions\StylesNotFoundException;
use App\Exceptions\ViewNotFoundException;

class App
{
    public function run(): void
    {
        try {
            session_start();
            $this->handle();
        } catch (ViewNotFoundException|ComponentNotFoundException|StylesNotFoundException|RouteNotFoundException $e) {
            View::exception($e);
        }
    }

    private function handle(): void
    {
        require_once realpath(dirname(__DIR__) . '/..') . "/routes/pages.php";

        $router = new Router();
        $router->handle(Route::list());
    }
}