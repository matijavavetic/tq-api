<?php

use Illuminate\Support\Facades\Route;
use src\Applications\Http\Controllers\FilmController;
use src\Applications\Http\Controllers\PlanetController;

Route::group(['middleware' => 'api'], function () {
    Route::post('character.film.list', [FilmController::class, 'characterFilmList']);
    Route::post('planet.list', [PlanetController::class, 'list']);
});