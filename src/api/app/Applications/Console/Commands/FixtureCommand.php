<?php

namespace src\Applications\Console\Commands;

use Doctrine\ORM\EntityManager;
use Illuminate\Console\Command;
use LaravelDoctrine\ORM\IlluminateRegistry;
use Nelmio\Alice\Loader\NativeLoader;

class FixtureCommand extends Command
{
    protected $signature = 'load:fixtures';
    protected $description = 'Load example fixtures for testing.';
    private EntityManager $em;

    public function __construct(
        public IlluminateRegistry $mr
    ) {
        parent::__construct();

        $this->em = $mr->getManager('default');
    }

    public function handle()
    {
        $fixture = $this->ask('[FIXTURE]: Enter "planet" to load Planet Fixture or "starship" for Starship Fixture');

        $loader = new NativeLoader();

        switch ($fixture) {
            case "planet":
                $resultSet = $loader->loadFile(base_path() . '/tests/Fixtures/PlanetFixture.yml');
                break;
            case "starship":
                $resultSet = $loader->loadFile(base_path() . '/tests/Fixtures/StarshipFixture.yml');
                break;
            default:
                $this->error('[FIXTURE]: Only "planet" or "starship".');
                return;
        }

        foreach ($resultSet->getObjects() as $object) {
            $this->em->persist($object);
        }

        $this->em->flush();

        $this->info('[FIXTURE]: Great! Fixture loaded successfully.');
    }
}
