<?php

namespace Tests\Unit;

use src\Business\Services\FilmService;
use src\Data\Enums\SWApiEndpoint;
use src\Data\Repositories\Contracts\FilmRepositoryInterface;
use src\Data\Repositories\Contracts\PersonRepositoryInterface;
use src\Data\Factories\PersonEntityFactory;
use src\Data\Factories\FilmEntityFactory;
use src\Data\Contracts\StorageInterface;
use Tests\Unit\AbstractUnitTest;
use src\Business\Exceptions\NotFoundException;
use src\Business\Mappers\Film\Request\CharacterFilmListRequestMapper;
use src\Data\Mappers\FilmEntityCollection;

/**
 * @group unit
 */
class FilmServiceTest extends AbstractUnitTest
{
    /** @var FilmRepositoryInterface */
    private $filmRepository;
    /** @var PersonRepositoryInterface */
    private $personRepository;

    private StorageInterface $storage;
    private FilmService $filmService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->storage = $this->app->make(StorageInterface::class);
        $this->filmRepository = $this->prophesize(FilmRepositoryInterface::class);
        $this->personRepository = $this->prophesize(PersonRepositoryInterface::class);
        $this->filmService = new FilmService(
            $this->filmRepository->reveal(),
            $this->personRepository->reveal()
        );
    }

    public function testListActionReturnsSuccessAndListResponseMapper(): void
    {
        $name = 'Luke Skywalker';

        $fetchPerson = $this->storage->fetch(SWApiEndpoint::fromValue(SWApiEndpoint::PEOPLE), $name);
        $fetchFilm = $this->storage->fetch(SWApiEndpoint::fromValue(SWApiEndpoint::FILMS));

        $person = PersonEntityFactory::make($fetchPerson[0]);
        $film = FilmEntityFactory::make($fetchFilm[0]);

        $this->personRepository
            ->findOneByName($name)
            ->shouldBeCalledOnce()
            ->willReturn($person);  

        $this->filmRepository
            ->findAllByCharacterUrl($person->getUrl())
            ->shouldBeCalledOnce()
            ->willReturn(new FilmEntityCollection([$film]));
            
        $this->filmService->characterFilmList(new CharacterFilmListRequestMapper($name));
    }

    public function testWillThrowExceptionIfNoCharacterFound(): void
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('No characters found.');

        $name = 'Character name that definitely does not exist';

        $this->personRepository
            ->findOneByName($name)
            ->shouldBeCalledOnce()
            ->willReturn(null);
            
        $this->filmService->characterFilmList(new CharacterFilmListRequestMapper($name));     
    }

    public function testWillThrowExceptionIfEntityCollectionEmpty(): void
    {
        $this->expectException(NotFoundException::class);
        $this->expectExceptionMessage('No films found.');

        $fetchPerson = $this->storage->fetch(SWApiEndpoint::fromValue(SWApiEndpoint::PEOPLE), 'Luke Skywalker');

        $person = PersonEntityFactory::make($fetchPerson[0]);

        $this->personRepository
            ->findOneByName($person->getName())
            ->shouldBeCalledOnce()
            ->willReturn($person); 

        $this->filmRepository
            ->findAllByCharacterUrl($person->getUrl())
            ->shouldBeCalledOnce()
            ->willReturn(new FilmEntityCollection());
            
        $this->filmService->characterFilmList(new CharacterFilmListRequestMapper($person->getName()));     
    }
}