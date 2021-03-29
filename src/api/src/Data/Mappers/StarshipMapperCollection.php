<?php

namespace src\Data\Mappers;

use Illuminate\Database\Eloquent\Collection;
use src\Business\Mappers\Starship\StarshipMapper;

class StarshipMapperCollection extends Collection
{
    public function tack(StarshipMapper $mapper): void
    {
        $this->add($mapper);
    }
}