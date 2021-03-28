<?php

namespace src\Data\Entities;

use src\Data\Entities\Contracts\StarshipEntityInterface;

class Starship implements StarshipEntityInterface
{
    private string $name;
    private string $model;
    private string $starshipClass;
    private string $manufacturer;
    private string $costInCredits;
    private string $length;
    private string $crew;
    private int $passengers;
    private string $maxAtmospheringSpeed;
    private string $hyperdriveRating;
    private string $MGLT;
    private string $cargoCapacity;
    private string $consumables;
    private array $films;
    private array $pilots;
    private string $url;
    private string $created;
    private string $edited;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function setCreated(string $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getEdited(): string
    {
        return $this->edited;
    }

    public function setEdited(string $edited): self
    {
        $this->edited = $edited;

        return $this;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel(string $model)
    {
        $this->model = $model;

        return $this;
    }
    
    public function getStarshipClass()
    {
        return $this->starshipClass;
    }

    public function setStarshipClass(string $starshipClass)
    {
        $this->starshipClass = $starshipClass;

        return $this;
    }

    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function getCostInCredits()
    {
        return $this->costInCredits;
    }

    public function setCostInCredits(string $costInCredits)
    {
        $this->costInCredits = $costInCredits;

        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength(string $length)
    {
        $this->length = $length;

        return $this;
    }

    public function getCrew()
    {
        return $this->crew;
    }

    public function setCrew(string $crew)
    {
        $this->crew = $crew;

        return $this;
    }

    public function getPassengers(): int
    {
        return $this->passengers;
    }

    public function setPassengers(int $passengers)
    {
        $this->passengers = $passengers;

        return $this;
    }

    public function getMaxAtmospheringSpeed()
    {
        return $this->maxAtmospheringSpeed;
    }

    public function setMaxAtmospheringSpeed(string $maxAtmospheringSpeed)
    {
        $this->maxAtmospheringSpeed = $maxAtmospheringSpeed;

        return $this;
    }

    public function getHyperdriveRating()
    {
        return $this->hyperdriveRating;
    }

    public function setHyperdriveRating(string $hyperdriveRating)
    {
        $this->hyperdriveRating = $hyperdriveRating;

        return $this;
    }

    public function getMGLT()
    {
        return $this->MGLT;
    }

    public function setMGLT(string $MGLT)
    {
        $this->MGLT = $MGLT;

        return $this;
    }

    public function getCargoCapacity()
    {
        return $this->cargoCapacity;
    }


    public function setCargoCapacity(string $cargoCapacity)
    {
        $this->cargoCapacity = $cargoCapacity;

        return $this;
    }

    public function getConsumables()
    {
        return $this->consumables;
    }

    public function setConsumables(string $consumables)
    {
        $this->consumables = $consumables;

        return $this;
    }

    public function getFilms()
    {
        return $this->films;
    }

    public function setFilms(array $films)
    {
        $this->films = $films;

        return $this;
    }

    public function getPilots()
    {
        return $this->pilots;
    }

    public function setPilots(array $pilots)
    {
        $this->pilots = $pilots;

        return $this;
    }
}