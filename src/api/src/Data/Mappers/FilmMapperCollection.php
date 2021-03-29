<?php

namespace src\Data\Mappers;

use Illuminate\Database\Eloquent\Collection;
use src\Business\Mappers\Film\FilmMapper;

class FilmMapperCollection extends Collection
{
    public function tack(FilmMapper $mapper): void
    {
        $this->add($mapper);
    }
}