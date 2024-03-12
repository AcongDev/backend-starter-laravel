<?php
use App\Http\Controllers\Api\AuthController;

Route::prefix('cms')->group(function ($route) {
    $route->post('register', AuthController::class . '@register');
    $route->post('login', AuthController::class . '@login');
});