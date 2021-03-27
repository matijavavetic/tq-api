<?php

namespace src\Applications\Factories\Film;

use src\Business\Mappers\Film\Request\CharacterFilmListRequestMapper;

class CharacterFilmListRequestMapperFactory
{
    public static function make(array $data): CharacterFilmListRequestMapper
    {
        $mapper = new CharacterFilmListRequestMapper($data['characterName']);

        return $mapper;
    }
}