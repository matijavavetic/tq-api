<?php

namespace src\Applications\Console\Commands;

use Illuminate\Console\Command;
use Nelmio\Alice\Loader\NativeLoader;

class FixtureCommand extends Command
{
    protected $signature = 'load:fixtures';

    protected $description = 'Load example fixtures for testing.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $loader = new NativeLoader();

        $manager = app('em');

        $resultSet = $loader->loadFile(dirname(__DIR__, 4) . '/tests/Fixtures/StarshipFixture.yml');

        foreach ($resultSet->getObjects() as $object) {
            $manager->persist($object);
        }

        $manager->flush();
    }
}
