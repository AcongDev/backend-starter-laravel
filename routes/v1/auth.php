<?php
use App\Http\Controllers\Api\Apicontroller;

Route::prefix('cms')->group(function ($route) {
    $route->post('register', Apicontroller::class . '@register');
    $route->post('login', Apicontroller::class . '@login');
});