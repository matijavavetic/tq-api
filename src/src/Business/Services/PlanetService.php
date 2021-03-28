<?php

namespace src\Business\Services;

use src\Business\Mappers\Planet\Request\PlanetListRequestMapper;
use src\Business\Factories\Planet\PlanetListResponseMapperFactory;
use src\Business\Mappers\Planet\Response\PlanetListResponseMapper;
use src\Data\Repositories\Contracts\PlanetRepositoryInterface;
use src\Business\Exceptions\NotFoundException;

class PlanetService
{
    public function __construct(
        private PlanetRepositoryInterface $planetRepository
    ) {}

    public function list(PlanetListRequestMapper $mapper): PlanetListResponseMapper
    {
        $planets = $this->planetRepository->list($mapper->getCreatedAfter());

        if ($planets->isEmpty()) {
            throw new NotFoundException('No planets found.');
        }

        $responseMapper = PlanetListResponseMapperFactory::make($planets);

        return $responseMapper;
    }
}