<?php

namespace src\Applications\Factories\Planet;

use src\Business\Mappers\Planet\Request\PlanetListRequestMapper;

class PlanetListRequestMapperFactory
{
    public static function make(array $data): PlanetListRequestMapper
    {
        $mapper = new PlanetListRequestMapper();
        $mapper->setCreatedAfter($data['createdAfter']);

        return $mapper;
    }
}