<?php

namespace src\Business\Factories\Film;

use src\Business\Mappers\Film\FilmMapper;
use src\Business\Mappers\Film\Response\CharacterFilmListResponseMapper;
use src\Data\Mappers\FilmEntityCollection;
use src\Data\Mappers\FilmMapperCollection;

class CharacterFilmListResponseMapperFactory
{
    public static function make(FilmEntityCollection $filmCollection): CharacterFilmListResponseMapper
    {
        $filmMapperCollection = new FilmMapperCollection();

        foreach ($filmCollection as $film) {
            $filmMapper = new FilmMapper(
                $film->getTitle(),
                $film->getEpisodeId(),
                $film->getOpeningCrawl(),
                $film->getDirector(),
                $film->getProducer(),
                $film->getReleaseDate(),
                $film->getSpecies(),
                $film->getVehicles(),
                $film->getStarships(),
                $film->getCharacters(),
                $film->getPlanets(),
                $film->getUrl(),
                $film->getCreated(),
                $film->getEdited()
            );

            $filmMapperCollection->tack($filmMapper);
        }

        $responseMapper = new CharacterFilmListResponseMapper();
        $responseMapper->setFilmMappers($filmMapperCollection);

        return $responseMapper;
    }
}