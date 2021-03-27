<?php

namespace src\Data\Models;

use src\Data\Models\Contracts\FilmEntityInterface;

class Film implements FilmEntityInterface
{
    private string $title;
    private int $episodeId;
    private string $openingCrawl;
    private string $director;
    private string $producer;
    private string $releaseDate;
    private array $species;
    private array $vehicles;
    private array $starships;
    private array $characters;
    private array $planets;
    private string $url;
    private string $created;
    private string $edited;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getEpisodeId(): int
    {
        return $this->episodeId;
    }

    public function setEpisodeId(int $episodeId): self
    {
        $this->episodeId = $episodeId;

        return $this;
    }

    public function getOpeningCrawl(): string
    {
        return $this->openingCrawl;
    }

    public function setOpeningCrawl(string $openingCrawl): self
    {
        $this->openingCrawl = $openingCrawl;

        return $this;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function setDirector(string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getProducer(): string
    {
        return $this->producer;
    }

    public function setProducer(string $producer): self
    {
        $this->producer = $producer;

        return $this;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(string $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

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

    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    public function setVehicles(array $vehicles): self
    {
        $this->vehicles = $vehicles;

        return $this;
    }

    public function getStarships(): array
    {
        return $this->starships;
    }

    public function setStarships(array $starships)
    {
        $this->starships = $starships;

        return $this;
    }

    public function getCharacters(): array
    {
        return $this->characters;
    }

    public function setCharacters(array $characters): self
    {
        $this->characters = $characters;

        return $this;
    }

    public function getPlanets(): array
    {
        return $this->planets;
    }

    public function setPlanets(array $planets): self
    {
        $this->planets = $planets;

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