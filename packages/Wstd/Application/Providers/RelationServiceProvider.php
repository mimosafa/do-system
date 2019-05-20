<?php

namespace Wstd\Application\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Wstd\Infrastructure\Eloquents\Car;
use Wstd\Infrastructure\Eloquents\Vendor;

class RelationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'car' => Car::class,
            'vendor' => Vendor::class,
        ]);
    }
}
