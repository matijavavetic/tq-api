<?php

namespace src\Business\Mappers\Starship\Request;

class StarshipListRequestMapper
{
    public function __construct(
        private int $passengers
    ) {}

    public function getPassengers(): int
    {
        return $this->passengers;
    }
}