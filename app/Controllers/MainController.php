<?php

namespace App\Controllers;

use App\Application\Router\Router;
use App\Application\Views\View;
use App\Exceptions\ViewNotFoundException;

class MainController
{
    /**
     * @throws ViewNotFoundException
     */
    public function index(): void
    {
        $router = new Router();

        if (isset($_SESSION['user'])) {
            $router->run('/panel');
            return;
        }

        View::show('main');
    }
}