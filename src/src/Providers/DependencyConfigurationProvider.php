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

class DependencyConfigurationProvider extends ServiceProvider
{
    public function BindAbstractToConcrete()
    {
        $this->app->bind(ApiClientInterface::class, StarWarsApiClient::class);
        $this->app->bind(FilmRepositoryInterface::class, FilmRepository::class);
        $this->app->bind(PersonRepositoryInterface::class, PersonRepository::class);
        $this->app->bind(FilmEntityInterface::class, Film::class);
        $this->app->bind(PersonEntityInterface::class, Person::class);
    }

    public function boot()
    {
        $this->BindAbstractToConcrete();
    }
}