<?php

namespace src\Applications\Factories\Starship;

use src\Business\Mappers\Starship\Request\StarshipListRequestMapper;

class StarshipListRequestMapperFactory
{
    public static function make(array $data): StarshipListRequestMapper
    {
        $mapper = new StarshipListRequestMapper($data['passengers']);

        return $mapper;
    }
}