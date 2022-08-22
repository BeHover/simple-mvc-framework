<?php


use App\Application\Router\Route;
use App\Controllers\MainController;
use App\Controllers\UserController;
use App\Controllers\PostController;

Route::get('/', MainController::class, 'index');

Route::get('/register', UserController::class, 'register');
Route::post('/register', UserController::class, 'register');

Route::get('/login', UserController::class, 'login');
Route::post('/login', UserController::class, 'login');

Route::get('/panel', PostController::class, 'panel');
Route::post('/panel', PostController::class, 'save');

Route::get('/logout', UserController::class, 'logout');