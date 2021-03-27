<?php

namespace src\Data\Mappers;

use Illuminate\Database\Eloquent\Collection;
use src\Business\Mappers\Planet\PlanetMapper;

class PlanetMapperCollection extends Collection
{
    public function tack(PlanetMapper $mapper): void
    {
        $this->add($mapper);
    }
}