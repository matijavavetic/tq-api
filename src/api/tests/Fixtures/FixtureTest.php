<?php

namespace Tests\Fixtures;

use Doctrine\ORM\EntityRepository;
use src\Data\Entities\Planet;
use src\Data\Entities\Starship;

class FixtureTest extends FixtureTestCase
{
    private EntityRepository $starshipRepository;
    private EntityRepository $planetRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->planetRepository = $this->em->getRepository(Planet::class);
        $this->starshipRepository = $this->em->getRepository(Starship::class);
    }

    public function testDatabaseHasLoadedFixturesData(): void
    {
        $this->assertDatabaseHas('planet', [
            'name' => 'Test Planet',
            'gravity' => 'Test Gravity'
        ]);

        $this->assertDatabaseHas('starship', [
            'name' => 'Test Starship',
            'model' => 'Test Model Starship'
        ]);
    }

    public function testFixtureRelation(): void
    {
        $planet = $this->planetRepository->findBy([
            'name' => 'Test Planet'
        ]);

        $starship = $this->starshipRepository->findBy([
            'name' => 'Test Starship'
        ]);

        $planetEntity = $planet[0];
        $starshipEntity = $starship[0];

        $this->assertEquals($starshipEntity, $planetEntity->getStarships()[0]);
        $this->assertEquals($planetEntity, $starshipEntity->getPlanet());
    }
}
