<?php

namespace App\Controllers;

use App\Application\Router\Router;
use App\Application\Views\View;
use App\Exceptions\ViewNotFoundException;
use App\Models\User;
use App\Application\Database\Connection;

class UserController
{
    /**
     * @throws ViewNotFoundException
     */
    public function login(): void
    {
        $router = new Router();

        if (isset($_SESSION['user'])) {
            $router->run('/panel');
            return;
        }

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!isset($email) || !isset($password)) {
                View::show('login', [
                    "error" => "Please complete all fields."
                ]);
                return;
            }

            $connection = new Connection();
            $query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
            $stmt = $connection->connect()->prepare($query);
            $stmt->execute();

            $result = $stmt->fetch();

            if ($result === false) {
                View::show('login', [
                    "error" => "Wrong email or password."
                ]);
            } else {
                $_SESSION['user'] = [
                    "email" => $result['email'],
                    "position" => $result['position']
                ];

                $router->run('/panel');
            }
        } else {
            View::show('login');
        }
    }

    /**
     * @throws ViewNotFoundException
     */
    public function register(): void
    {
        $router = new Router();

        if (isset($_SESSION['user'])) {
            $router->run('/panel');
            return;
        }

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $position = $_POST['position'];

            if (!isset($email)) {
                View::show('register', [
                    "error" => "Please enter your email."
                ]);
                return;
            } else {
                if (preg_match("/^[_a-z0-9-]{3,}+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{3})$/", $email)) {
                    $connection = new Connection();
                    $query = "SELECT * FROM `users` WHERE email = '$email'";
                    $stmt = $connection->connect()->prepare($query);
                    $stmt->execute();

                    if (count($stmt->fetchAll()) > 0) {
                        View::show('register', [
                            "error" => "This email is already taken."
                        ]);
                        return;
                    }
                } else {
                    View::show('register', [
                        "error" => "Please enter a valid email."
                    ]);
                    return;
                }
            }

            if (!isset($password)) {
                View::show('register', [
                    "error" => "Please enter your password."
                ]);
                return;
            } else {
                if (!preg_match("/^\w{6,24}/", $password)) {
                    View::show('register', [
                        "error" => "The password must contain at least 6 and no more than 24 characters."
                    ]);
                    return;
                }

                if (!preg_match("/!/i", $password)) {
                    View::show('register', [
                        "error" => "The password must contain an exclamation mark."
                    ]);
                    return;
                }
            }

            if (!isset($position)) {
                View::show('register', [
                    "error" => "Please select your position."
                ]);
                return;
            }

            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setPosition($position);
            $user->store();

            $router->run('/login');
        } else {
            View::show('register');
        }
    }

    public function logout(): void
    {
        $router = new Router();

        if (isset($_SESSION['user'])) {
            $_SESSION = [];
        }

        $router->run('/');
    }
}