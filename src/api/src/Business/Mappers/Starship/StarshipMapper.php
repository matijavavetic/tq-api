<?php

namespace src\Business\Mappers\Starship;

use JsonSerializable;

class StarshipMapper implements JsonSerializable
{
    public function __construct(
        private string $name,
        private string $model,
        private string $starshipClass,
        private string $manufacturer,
        private string $costInCredits,
        private string $length,
        private string $crew,
        private string $passengers,
        private string $maxAtmospheringSpeed,
        private string $hyperdriveRating,
        private string $MGLT,
        private string $cargoCapacity,
        private string $consumables,
        private array $films,
        private array $pilots,
        private string $url,
        private string $created,
        private string $edited
    ) {}

    public function getName(): string
    {
        return $this->name;
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

    public function getModel(): string
    {
        return $this->model;
    }

    public function getStarshipClass(): string
    {
        return $this->starshipClass;
    }

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function getCostInCredits(): string
    {
        return $this->costInCredits;
    }

    public function getLength(): string
    {
        return $this->length;
    }

    public function getCrew(): string
    {
        return $this->crew;
    }

    public function getPassengers(): string
    {
        return $this->passengers;
    }

    public function getMaxAtmospheringSpeed(): string
    {
        return $this->maxAtmospheringSpeed;
    }

    public function getHyperdriveRating(): string
    {
        return $this->hyperdriveRating;
    }

    public function getMGLT(): string
    {
        return $this->MGLT;
    }

    public function getCargoCapacity(): string
    {
        return $this->cargoCapacity;
    }

    public function getConsumables(): string
    {
        return $this->consumables;
    }

    public function getFilms(): array
    {
        return $this->films;
    }

    public function getPilots(): array
    {
        return $this->pilots;
    }

    public function jsonSerialize()
    {
        $output = [
            'name' => $this->getName(),
            'model' => $this->getModel(),
            'starshipClass' => $this->getStarshipClass(),
            'manufacturer' => $this->getManufacturer(),
            'costInCredits' => $this->getCostInCredits(),
            'length' => $this->getLength(),
            'crew' => $this->getCrew(),
            'passengers' => $this->getPassengers(),
            'maxAtmospheringSpeed' => $this->getMaxAtmospheringSpeed(),
            'hyperdriveRating' => $this->getHyperdriveRating(),
            'MGLT' => $this->getMGLT(),
            'cargoCapacity' => $this->getCargoCapacity(),
            'consumables' => $this->getConsumables(),
            'films' => $this->getFilms(),
            'pilots' => $this->getPilots(),
            'url' => $this->getUrl(),
            'created' => $this->getCreated(),
            'edited' => $this->getEdited()
        ];

        return $output;
    }
}