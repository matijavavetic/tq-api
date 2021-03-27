<?php

namespace src\Data\Mappers;

use Illuminate\Database\Eloquent\Collection;
use src\Data\Models\Contracts\FilmEntityInterface;

class FilmEntityCollection extends Collection
{
    public function tack(FilmEntityInterface $film): void
    {
        $this->add($film);
    }
}