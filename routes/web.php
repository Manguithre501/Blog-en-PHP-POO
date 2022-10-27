<?php

use Routes\Router;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;


Router::get('/', [BlogController::class, 'index']);
Router::get('/single/:id', [BlogController::class, 'show']);


Router::get('/comment/:id', [BlogController::class, 'allComments']);
Router::post('/comment', [BlogController::class, 'commentStore']);

/*
Router::get('/search-result', [BlogController::class, 'searchResult']); */



/* ROUTE POUR LA PAGE PROFILE **/

Router::get('/profile', [ProfileController::class, 'show']);
Router::post('/update', [ProfileController::class, 'update']);

require __DIR__ . '/Auth/auth.php';
