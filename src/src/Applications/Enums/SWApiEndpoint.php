<?php

namespace src\Applications\Enums;

use BenSampo\Enum\Enum;

final class SWApiEndpoint extends Enum
{
    const API_BASE_PATH = 'https://swapi.dev/api/';

    const PEOPLE        = self::API_BASE_PATH . 'people/';
    const PEOPLE_SEARCH = self::API_BASE_PATH . 'people/?search=';
    const FILMS         = self::API_BASE_PATH . 'films/';
    const PLANETS       = self::API_BASE_PATH . 'planets/';
}