<?php

namespace src\Business\Services;

use src\Business\Mappers\Film\Request\CharacterFilmListRequestMapper;
use src\Business\Factories\Film\CharacterFilmListResponseMapperFactory;
use src\Business\Mappers\Film\Response\CharacterFilmListResponseMapper;
use Symfony\Component\HttpFoundation\Response;
use src\Data\Repositories\Contracts\FilmRepositoryInterface;
use src\Data\Repositories\Contracts\PersonRepositoryInterface;

class FilmService
{
    public function __construct(
        protected FilmRepositoryInterface $filmRepository,
        protected PersonRepositoryInterface $personRepository
    ) {}

    public function characterFilmList(CharacterFilmListRequestMapper $mapper): CharacterFilmListResponseMapper
    {
        $character = $this->personRepository->findOneByName($mapper->getCharacterName());
        
        if (! $character) {
            throw new \Exception('No characters found.', Response::HTTP_NOT_FOUND);    
        }

        $films = $this->filmRepository->findAllByCharacterUrl($character->getUrl());

        $responseMapper = CharacterFilmListResponseMapperFactory::make($films);

        return $responseMapper;
    }
}