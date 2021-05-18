<?php

namespace src\Business\Mappers\Planet\Request;

class PlanetListRequestMapper
{
    private string $createdAfter;

    public function setCreatedAfter(string $createdAfter): void
    {
        $this->createdAfter = $createdAfter;
    }

    public function getCreatedAfter(): string
    {
        return $this->createdAfter;
    }
}