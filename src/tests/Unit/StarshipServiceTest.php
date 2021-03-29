<?php

namespace Tests\Unit;

use src\Business\Mappers\Starship\Request\StarshipListRequestMapper;
use src\Business\Services\StarshipService;
use src\Data\Enums\SWApiEndpoint;
use src\Data\Mappers\StarshipEntityCollection;
use src\Data\Repositories\Contracts\StarshipRepositoryInterface;
use src\Data\Factories\StarshipEntityFactory;
use src\Data\Contracts\StorageInterface;
use Tests\Unit\AbstractUnitTest;
use src\Business\Exceptions\NotFoundException;
use src\Business\Starship\Response\StarshipListResponseMapper;

/**
 * @group unit
 */
class StarshipServiceTest extends AbstractUnitTest
{
    /** @var StarshipRepositoryInterface */
    private $starshipRepository;

    private StorageInterface $storage;
    private StarshipService $starshipService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->storage = $this->app->make(StorageInterface::class);
        $this->starshipRepository = $this->prophesize(StarshipRepositoryInterface::class);
        $this->starshipService = new StarshipService(
            $this->starshipRepository->reveal()
        );
    }

    public function testListActionReturnsSuccessAndListResponseMapper(): void
    {
        $fetch = $this->storage->fetch(SWApiEndpoint::fromValue(SWApiEndpoint::STARSHIPS));

        $starship = StarshipEntityFactory::make($fetch[0]);

        $this->starshipRepository
            ->list(2)
            ->shouldBeCalledOnce()
            ->willReturn(new StarshipEntityCollection([$starship]));  
            
        $listResponse = $this->starshipService->list(new StarshipListRequestMapper(2));
    }

    public function testWillThrowExceptionIfEntityCollectionEmpty(): void
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('No starships found.');

        $this->starshipRepository
            ->list(2)
            ->shouldBeCalledOnce()
            ->willReturn(new StarshipEntityCollection());
            
        $this->starshipService->list(new StarshipListRequestMapper(2));        
    }
}