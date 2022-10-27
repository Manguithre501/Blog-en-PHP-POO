<?php

use Routes\Router;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Router::get('/login', [AuthenticatedSessionController::class, 'create']);
Router::post('/store', [AuthenticatedSessionController::class, 'store']);





Router::get('/register', [RegisteredUserController::class, 'create']);

Router::post('/register', [RegisteredUserController::class, 'store']);



Router::post('/logout', [AuthenticatedSessionController::class, 'logout']);
