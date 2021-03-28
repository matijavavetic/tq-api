<?php

use Illuminate\Support\Facades\Route;
use src\Applications\Http\Controllers\FilmController;
use src\Applications\Http\Controllers\PlanetController;
use src\Applications\Http\Controllers\StarshipController;

Route::group(['middleware' => 'api'], function () {
    Route::post('character.film.list', [FilmController::class, 'characterFilmList']);
    Route::post('planet.list', [PlanetController::class, 'list']);
    Route::post('starship.list', [StarshipController::class, 'list']);
});