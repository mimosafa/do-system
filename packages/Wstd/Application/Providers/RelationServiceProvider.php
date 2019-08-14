<?php

namespace Wstd\Application\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
            'brand'  => \Wstd\Infrastructure\Eloquents\Brand::class,
            'car'    => \Wstd\Infrastructure\Eloquents\Car::class,
            'item'   => \Wstd\Infrastructure\Eloquents\Item::class,
            'vendor' => \Wstd\Infrastructure\Eloquents\Vendor::class,
        ]);
    }
}
