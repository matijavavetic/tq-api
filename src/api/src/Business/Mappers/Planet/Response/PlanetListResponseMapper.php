<?php

namespace src\Business\Mappers\Planet\Response;

use JsonSerializable;
use src\Data\Mappers\PlanetMapperCollection;

class PlanetListResponseMapper implements JsonSerializable
{
    private PlanetMapperCollection $planetMappers;

    public function getPlanetMappers(): PlanetMapperCollection
    {
        return $this->planetMappers;
    }

    public function setPlanetMappers(PlanetMapperCollection $planetMappers): void
    {
        $this->planetMappers = $planetMappers;
    }

    public function toArray(): PlanetMapperCollection
    {
        return $this->planetMappers;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}