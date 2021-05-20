<?php

namespace Tests\Fixtures;

use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManager;
use Nelmio\Alice\Loader\NativeLoader;
use src\Events\DatabaseRollbackAfterTestsEvent;
use Tests\TestCase;

class FixtureTestCase extends TestCase
{
    private string $fixturePath;
    protected EntityManager $em;
    private array $fixtureObjects;

    protected function setUp(): void
    {
        parent::setUp();

        $this->em = app('em');
        $this->fixturePath =  base_path().'/tests/Fixtures/StarshipFixture.yml';

        $this->loadFixtures();
    }

    protected function tearDown(): void
    {
        DatabaseRollbackAfterTestsEvent::dispatch($this->fixtureObjects);

        /* Example of using Doctrine ORM Purger to clean the database for each test

        $purger = new ORMPurger($this->em);
        $purger->setPurgeMode(ORMPurger::PURGE_MODE_DELETE);
        $purger->purge();
        */
        
        parent::tearDown();
    }

    private function loadFixtures(): void
    {
        $loader = new NativeLoader();

        $resultSet = $loader->loadFile($this->fixturePath);

        $this->fixtureObjects = $resultSet->getObjects();

        foreach ($this->fixtureObjects as $fixtureObject) {
            $this->em->persist($fixtureObject);
        }

        $this->em->flush();
    }
}
