<?php

namespace Tests\Fixtures;

use Doctrine\ORM\EntityManager;
use Nelmio\Alice\Loader\NativeLoader;
use Tests\TestCase;

class FixtureTestCase extends TestCase
{
    private string $fixturePath;
    protected EntityManager $em;
    private static $setup = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->em = app('em');
        $this->fixturePath =  base_path().'/tests/Fixtures/StarshipFixture.yml';

        if (! static::$setup) {
            $this->loadFixtures();

            static::$setup = true;
        }
    }

    private function loadFixtures(): void
    {
        $loader = new NativeLoader();

        $resultSet = $loader->loadFile($this->fixturePath);

        foreach ($resultSet->getObjects() as $object) {
            $this->em->persist($object);
        }

        $this->em->flush();
    }
}
