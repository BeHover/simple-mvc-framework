<?php

namespace App\Controllers;

use App\Application\Router\Router;
use App\Application\Views\View;
use App\Exceptions\ViewNotFoundException;
use App\Models\Post;
use App\Models\User;

class PostController
{
    /**
     * @throws ViewNotFoundException
     */
    public function panel(): void
    {
        $router = new Router();

        if (!isset($_SESSION['user'])) {
            $router->run('/');
            return;
        }

        View::show('post', [
            "user" => $_SESSION['user']
        ]);
    }

    public function save(): void
    {
        $posts = json_decode(file_get_contents('php://input'), true)['posts'];

        foreach ($posts as $item) {
            $post = new Post();
            $post->setTitle($item['title']);
            $post->setBody($item['body']);
            $post->setUser($item['user']);
            $post->setButton($item['button']);
            $post->store();
        }
    }
}