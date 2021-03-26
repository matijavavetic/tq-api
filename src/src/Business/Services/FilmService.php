<?php

namespace src\Business\Services;

use src\Business\Mappers\Film\Request\CharacterFilmListRequestMapper;
use src\Applications\Http\Clients\Contracts\StorageInterface;
use src\Business\Factories\Film\CharacterFilmListResponseMapperFactory;
use src\Data\Mappers\FilmEntityCollection;
use Symfony\Component\HttpFoundation\Response;
use src\Data\Models\Film;

class FilmService
{
    public function __construct(
        protected StorageInterface $storageInterface
    ) {}

    public function characterFilmList(CharacterFilmListRequestMapper $mapper)
    {
        $character = $this->storageInterface->people($mapper->getCharacterName());
        
        if (empty($character)) {
            throw new \Exception('No characters found.', Response::HTTP_NOT_FOUND);    
        }
        
        $characterUrl = $character[0]['url'];

        $films = $this->storageInterface->films();

        $filmCollection = new FilmEntityCollection();

        foreach ($films as $key => $value) {
            if (! in_array($characterUrl, $films[$key]['characters'])) {
                unset($films[$key]);
                continue;
            }

            $film = new Film();
            $film->setTitle($films[$key]['title']);
            $film->setEpisodeId($films[$key]['episode_id']);
            $film->setOpeningCrawl($films[$key]['opening_crawl']);
            $film->setDirector($films[$key]['director']);
            $film->setProducer($films[$key]['producer']);
            $film->setReleaseDate($films[$key]['release_date']);
            $film->setSpecies($films[$key]['species']);
            $film->setVehicles($films[$key]['vehicles']);
            $film->setStarships($films[$key]['starships']);
            $film->setCharacters($films[$key]['characters']);
            $film->setPlanets($films[$key]['planets']);
            $film->setUrl($films[$key]['url']);
            $film->setCreated($films[$key]['created']);
            $film->setEdited($films[$key]['edited']);

            $filmCollection->tack($film);
        }

        $responseMapper = CharacterFilmListResponseMapperFactory::make($filmCollection);

        return $responseMapper;
    }
}