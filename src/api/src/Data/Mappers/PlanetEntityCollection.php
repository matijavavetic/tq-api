<?php

namespace src\Data\Mappers;

use Illuminate\Database\Eloquent\Collection;
use src\Data\Entities\Contracts\PlanetEntityInterface;

class PlanetEntityCollection extends Collection
{
    public function tack(PlanetEntityInterface $planet): void
    {
        $this->add($planet);
    }
}