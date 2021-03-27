<?php

namespace src\Business\Services;

use src\Business\Mappers\Planet\Request\PlanetListRequestMapper;
use src\Business\Factories\Planet\PlanetListResponseMapperFactory;
use src\Business\Mappers\Planet\Response\PlanetListResponseMapper;
use src\Data\Repositories\Contracts\PlanetRepositoryInterface;

class PlanetService
{
    public function __construct(
        private PlanetRepositoryInterface $planetRepository
    ) {}

    public function list(PlanetListRequestMapper $mapper): PlanetListResponseMapper
    {
        $planets = $this->planetRepository->list($mapper->getCreatedAfter());

        $responseMapper = PlanetListResponseMapperFactory::make($planets);

        return $responseMapper;
    }
}