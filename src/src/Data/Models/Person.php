<?php

namespace src\Data\Models;

use src\Data\Models\Contracts\PersonEntityInterface;

class Person implements PersonEntityInterface
{
    private string $name;
    private string $birthYear;
    private string $eyeColor;
    private string $gender;
    private string $hairColor;
    private string $height;
    private string $mass;
    private string $skinColor;
    private string $homeWorld;
    private array $films;
    private array $species;
    private array $starships;
    private array $vehicles;
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

    public function getBirthYear(): string
    {
        return $this->birthYear;
    }

    public function setBirthYear(string $birthYear): self
    {
        $this->birthYear = $birthYear;

        return $this;
    }

    public function getEyeColor(): string
    {
        return $this->eyeColor;
    }

    public function setEyeColor(string $eyeColor): self
    {
        $this->eyeColor = $eyeColor;

        return $this;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getHairColor(): string
    {
        return $this->hairColor;
    }

    public function setHairColor(string $hairColor): self
    {
        $this->hairColor = $hairColor;

        return $this;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function setHeight(string $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getMass(): string
    {
        return $this->mass;
    }

    public function setMass(string $mass): self
    {
        $this->mass = $mass;

        return $this;
    }

    public function getSkinColor(): string
    {
        return $this->skinColor;
    }

    public function setSkinColor(string $skinColor): self
    {
        $this->skinColor = $skinColor;

        return $this;
    }

    public function getHomeWorld(): string
    {
        return $this->homeWorld;
    }

    public function setHomeWorld(string $homeWorld): self
    {
        $this->homeWorld = $homeWorld;

        return $this;
    }

    public function getFilms(): array
    {
        return $this->films;
    }

    public function setFilms(array $films): self
    {
        $this->films = $films;

        return $this;
    }

    public function getSpecies(): array
    {
        return $this->species;
    }

    public function setSpecies(array $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getStarships(): array
    {
        return $this->starships;
    }

    public function setStarships(array $starships): self
    {
        $this->starships = $starships;

        return $this;
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    public function setVehicles(array $vehicles): self
    {
        $this->vehicles = $vehicles;

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
}