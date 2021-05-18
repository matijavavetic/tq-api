<?php

namespace src\Data\Mappers;

use Illuminate\Database\Eloquent\Collection;
use src\Data\Entities\Contracts\StarshipEntityInterface;

class StarshipEntityCollection extends Collection
{
    public function tack(StarshipEntityInterface $starship): void
    {
        $this->add($starship);
    }
}