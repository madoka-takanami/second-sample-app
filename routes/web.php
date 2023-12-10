<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::name('tweets.')->group(function () {
    Route::get('/tweets', \App\Http\Controllers\Tweets\IndexController::class)
        ->name('index');

    Route::post('/tweets/create', \App\Http\Controllers\Tweets\CreateController::class)
        ->name('create');

    Route::get('/tweets/{id}', \App\Http\Controllers\Tweets\ShowController::class)
        ->name('show');
});
