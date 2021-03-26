<?php

use Illuminate\Support\Facades\Route;
use src\Applications\Http\Controllers\FilmController;

Route::group(['middleware' => 'api'], function () {
    Route::post('character.film.list', [FilmController::class, 'characterFilmList']);
});