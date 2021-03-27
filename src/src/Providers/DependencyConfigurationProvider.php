<?php

namespace src\Providers;

use Illuminate\Support\ServiceProvider;
use src\Applications\Clients\Contracts\ApiClientInterface;
use src\Applications\Clients\StarWarsApiClient;
use src\Data\Repositories\FilmRepository;
use src\Data\Repositories\Contracts\FilmRepositoryInterface;
use src\Data\Repositories\PersonRepository;
use src\Data\Repositories\Contracts\PersonRepositoryInterface;


class DependencyConfigurationProvider extends ServiceProvider
{
    public function BindAbstractToConcrete()
    {
        $this->app->bind(ApiClientInterface::class, StarWarsApiClient::class);
        $this->app->bind(FilmRepositoryInterface::class, FilmRepository::class);
        $this->app->bind(PersonRepositoryInterface::class, PersonRepository::class);
    }

    public function boot()
    {
        $this->BindAbstractToConcrete();
    }
}