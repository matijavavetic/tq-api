<?php

namespace Tests\Fixtures;

use Doctrine\ORM\EntityManager;
use Nelmio\Alice\Loader\NativeLoader;
use Tests\TestCase;

class FixtureTestCase extends TestCase
{
    private array $fixturePaths;
    protected EntityManager $em;

    protected function setUp(): void
    {
        parent::setUp();

        $this->em = app('em');

        $this->fixturePaths = [
            //base_path().'/tests/Fixtures/PlanetFixture.yml',
            base_path().'/tests/Fixtures/StarshipFixture.yml'
        ];

        $this->loadFixtures();
    }

    private function loadFixtures(): void
    {
        $loader = new NativeLoader();

        foreach ($this->fixturePaths as $fixturePath) {
            $resultSet = $loader->loadFile($fixturePath);

            foreach ($resultSet->getObjects() as $object) {
                $this->em->persist($object);
            }
        }

        $this->em->flush();
    }
}
