<?php

namespace src\Data\Enums;

use BenSampo\Enum\Enum;

final class SWApiEndpoint extends Enum
{
    const API_BASE_PATH = 'https://swapi.dev/api/';

    const PEOPLE    = self::API_BASE_PATH . 'people/?search=';
    const FILMS     = self::API_BASE_PATH . 'films/?search=';
    const PLANETS   = self::API_BASE_PATH . 'planets/?search=';
    const STARSHIPS = self::API_BASE_PATH . 'starships/?search=';
}