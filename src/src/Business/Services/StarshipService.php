<?php

namespace src\Business\Services;

use src\Business\Mappers\Starship\Request\StarshipListRequestMapper;
use src\Business\Factories\Starship\StarshipListResponseMapperFactory;
use src\Business\Mappers\Starship\Response\StarshipListResponseMapper;
use src\Data\Repositories\Contracts\StarshipRepositoryInterface;

class StarshipService
{
    public function __construct(
        private StarshipRepositoryInterface $starshipRepository
    ) {}

    public function list(StarshipListRequestMapper $mapper): StarshipListResponseMapper
    {
        $starships = $this->starshipRepository->list($mapper->getPassengers());

        $responseMapper = StarshipListResponseMapperFactory::make($starships);

        return $responseMapper;
    }
}