<?php

namespace src\Business\Services;

use src\Business\Mappers\Film\Request\CharacterFilmListRequestMapper;
use src\Business\Factories\Film\CharacterFilmListResponseMapperFactory;
use src\Business\Mappers\Film\Response\CharacterFilmListResponseMapper;
use Symfony\Component\HttpFoundation\Response;
use src\Data\Repositories\Contracts\FilmRepositoryInterface;
use src\Data\Repositories\Contracts\PersonRepositoryInterface;
use src\Business\Exceptions\NotFoundException;

class FilmService
{
    public function __construct(
        private FilmRepositoryInterface $filmRepository,
        private PersonRepositoryInterface $personRepository
    ) {}

    public function characterFilmList(CharacterFilmListRequestMapper $mapper): CharacterFilmListResponseMapper
    {
        $character = $this->personRepository->findOneByName($mapper->getCharacterName());
        
        if (! $character) {
            throw new NotFoundException('No characters found.', Response::HTTP_NOT_FOUND);    
        }

        $films = $this->filmRepository->findAllByCharacterUrl($character->getUrl());

        if ($films->isEmpty()) {
            throw new NotFoundException('No films found.', Response::HTTP_NOT_FOUND);
        }

        $responseMapper = CharacterFilmListResponseMapperFactory::make($films);

        return $responseMapper;
    }
}