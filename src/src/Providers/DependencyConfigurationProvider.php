<?php

namespace src\Providers;

use Illuminate\Support\ServiceProvider;
use src\Applications\Clients\Contracts\ApiClientInterface;
use src\Applications\Clients\StarWarsApiClient;
use src\Data\Repositories\FilmRepository;
use src\Data\Repositories\Contracts\FilmRepositoryInterface;
use src\Data\Repositories\PersonRepository;
use src\Data\Repositories\Contracts\PersonRepositoryInterface;
use src\Data\Entities\Film;
use src\Data\Entities\Person;
use src\Data\Entities\Contracts\FilmEntityInterface;
use src\Data\Entities\Contracts\PersonEntityInterface;
use src\Data\Repositories\Contracts\PlanetRepositoryInterface;
use src\Data\Repositories\PlanetRepository;
use src\Data\Entities\Contracts\PlanetEntityInterface;
use src\Data\Entities\Planet;

class DependencyConfigurationProvider extends ServiceProvider
{
    public function BindAbstractToConcrete()
    {
        // API clients
        $this->app->bind(ApiClientInterface::class, StarWarsApiClient::class);

        // Repositories
        $this->app->bind(FilmRepositoryInterface::class, FilmRepository::class);
        $this->app->bind(PersonRepositoryInterface::class, PersonRepository::class);
        $this->app->bind(PlanetRepositoryInterface::class, PlanetRepository::class);

        // Entities
        $this->app->bind(PersonEntityInterface::class, Person::class);
        $this->app->bind(PlanetEntityInterface::class, Planet::class);
        $this->app->bind(FilmEntityInterface::class, Film::class);
    }

    public function boot()
    {
        $this->BindAbstractToConcrete();
    }
}