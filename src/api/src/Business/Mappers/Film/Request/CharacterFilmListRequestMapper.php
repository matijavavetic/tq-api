<?php

namespace src\Business\Mappers\Film\Request;

class CharacterFilmListRequestMapper
{
    private string $characterName;

    public function __construct(string $characterName)
    {
        $this->characterName = $characterName;
    }

    public function getCharacterName(): string
    {
        return $this->characterName;
    }
}