<?php

namespace src\Data\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected string $title;
    protected int $episodeId;
    protected string $openingCrawl;
    protected string $director;
    protected string $producer;
    protected string $releaseDate;
    protected array $species;
    protected array $vehicles;
    protected array $starships;
    protected array $characters;
    protected array $planets;
    protected string $url;
    protected string $created;
    protected string $edited;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    public function getEpisodeId(): int
    {
        return $this->episodeId;
    }

    public function setEpisodeId(int $episodeId)
    {
        $this->episodeId = $episodeId;

        return $this;
    }

    public function getOpeningCrawl(): string
    {
        return $this->openingCrawl;
    }

    public function setOpeningCrawl(string $openingCrawl)
    {
        $this->openingCrawl = $openingCrawl;

        return $this;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function setDirector(string $director)
    {
        $this->director = $director;

        return $this;
    }

    public function getProducer(): string
    {
        return $this->producer;
    }

    public function setProducer(string $producer)
    {
        $this->producer = $producer;

        return $this;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(string $releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getSpecies(): array
    {
        return $this->species;
    }

    public function setSpecies(array $species)
    {
        $this->species = $species;

        return $this;
    }

    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    public function setVehicles(array $vehicles)
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

    public function setCharacters(array $characters)
    {
        $this->characters = $characters;

        return $this;
    }

    public function getPlanets(): array
    {
        return $this->planets;
    }

    public function setPlanets(array $planets)
    {
        $this->planets = $planets;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function setCreated(string $created)
    {
        $this->created = $created;

        return $this;
    }

    public function getEdited(): string
    {
        return $this->edited;
    }

    public function setEdited(string $edited)
    {
        $this->edited = $edited;

        return $this;
    }
}