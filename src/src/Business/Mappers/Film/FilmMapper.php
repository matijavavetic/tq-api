<?php

namespace src\Business\Mappers\Film;

use JsonSerializable;

class FilmMapper implements JsonSerializable
{
    public function __construct(
        protected string $title,
        protected int $episodeId,
        protected string $openingCrawl,
        protected string $director,
        protected string $producer,
        protected string $releaseDate,
        protected array $species,
        protected array $vehicles,
        protected array $starships,
        protected array $characters,
        protected array $planets,
        protected string $url,
        protected string $created,
        protected string $edited
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getEpisodeId()
    {
        return $this->episodeId;
    }

    public function getOpeningCrawl()
    {
        return $this->openingCrawl;
    }

    public function getDirector()
    {
        return $this->director;
    }

    public function getProducer()
    {
        return $this->producer;
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function getVehicles()
    {
        return $this->vehicles;
    }

    public function getStarships()
    {
        return $this->starships;
    }

    public function getCharacters()
    {
        return $this->characters;
    }

    public function getPlanets()
    {
        return $this->planets;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getEdited()
    {
        return $this->edited;
    }

    public function jsonSerialize()
    {
        $output = [
            'title' => $this->getTitle(),
            'episodeId' => $this->getEpisodeId(),
            'openingCrawl' => $this->getOpeningCrawl(),
            'director' => $this->getDirector(),
            'producer' => $this->getProducer(),
            'releaseDate' => $this->getReleaseDate(),
            'species' => $this->getSpecies(),
            'vehicles' => $this->getVehicles(),
            'starships' => $this->getStarships(),
            'characters' => $this->getCharacters(),
            'planets' => $this->getPlanets(),
            'url' => $this->getUrl(),
            'created' => $this->getCreated(),
            'edited' => $this->getEdited()
        ];

        return $output;
    }
}