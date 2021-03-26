<?php

namespace src\Providers;

use Illuminate\Support\ServiceProvider;
use src\Applications\Http\Clients\Contracts\StorageInterface;
use src\Applications\Http\Clients\StarWarsApiHttpClient;


class DependencyConfigurationProvider extends ServiceProvider
{
    public function BindAbstractToConcrete()
    {
        $this->app->bind(StorageInterface::class, StarWarsApiHttpClient::class);
    }

    public function boot()
    {
        $this->BindAbstractToConcrete();
    }
}