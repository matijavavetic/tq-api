<?php

namespace src\Business\Mappers\Planet;

use JsonSerializable;

class PlanetMapper implements JsonSerializable
{
    public function __construct(
        private string $name,
        private string $diameter,
        private string $rotationPeriod,
        private string $orbitalPeriod,
        private string $gravity,
        private string $population,
        private string $climate,
        private string $terrain,
        private string $surfaceWater,
        private array $films,
        private array $residents,
        private string $url,
        private string $created,
        private string $edited
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getDiameter(): string
    {
        return $this->diameter;
    }

    public function getRotationPeriod(): string
    {
        return $this->rotationPeriod;
    }

    public function getOrbitalPeriod(): string
    {
        return $this->orbitalPeriod;
    }

    public function getGravity(): string
    {
        return $this->gravity;
    }

    public function getPopulation(): string
    {
        return $this->population;
    }

    public function getClimate(): string
    {
         return $this->climate;
    }

    public function getTerrain(): string
    {
        return $this->terrain;
    }

    public function getSurfaceWater(): string
    {
        return $this->surfaceWater;
    }

    public function getFilms(): array
    {
        return $this->films;
    }

    public function getResidents(): array
    {
        return $this->residents;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getEdited(): string
    {
        return $this->edited;
    }

    public function jsonSerialize()
    {
        $output = [
            'name' => $this->getName(),
            'diameter' => $this->getDiameter(),
            'rotationPeriod' => $this->getRotationPeriod(),
            'orbitalPeriod' => $this->getOrbitalPeriod(),
            'gravity' => $this->getGravity(),
            'population' => $this->getPopulation(),
            'climate' => $this->getClimate(),
            'terrain' => $this->getTerrain(),
            'surfaceWater' => $this->getSurfaceWater(),
            'residents' => $this->getResidents(),
            'films' => $this->getFilms(),
            'url' => $this->getUrl(),
            'created' => $this->getCreated(),
            'edited' => $this->getEdited()
        ];

        return $output;
    }
}