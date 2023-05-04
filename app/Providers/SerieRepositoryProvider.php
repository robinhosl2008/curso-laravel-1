<?php

namespace App\Providers;

use App\Repository\EloquentSerieRepository;
use App\Repository\SerieRepository;
use Illuminate\Support\ServiceProvider;

class SerieRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SerieRepository::class, EloquentSerieRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
