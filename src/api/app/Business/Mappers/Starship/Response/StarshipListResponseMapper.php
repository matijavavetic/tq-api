<?php

namespace src\Business\Mappers\Starship\Response;

use JsonSerializable;
use src\Data\Mappers\StarshipMapperCollection;

class StarshipListResponseMapper implements JsonSerializable
{
    private StarshipMapperCollection $planetMappers;

    public function getStarshipMappers(): StarshipMapperCollection
    {
        return $this->planetMappers;
    }

    public function setStarshipMappers(StarshipMapperCollection $planetMappers): void
    {
        $this->planetMappers = $planetMappers;
    }

    public function toArray(): StarshipMapperCollection
    {
        return $this->planetMappers;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}