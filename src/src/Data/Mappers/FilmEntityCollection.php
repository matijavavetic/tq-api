<?php

namespace src\Data\Mappers;

use Illuminate\Database\Eloquent\Collection;
use src\Data\Models\Film;

class FilmEntityCollection extends Collection
{
    public function tack(Film $film)
    {
        $this->add($film);
    }
}