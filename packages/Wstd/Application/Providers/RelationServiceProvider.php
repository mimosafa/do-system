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
            'car'    => \Wstd\Infrastructure\Eloquents\Car::class,
            'item'   => \Wstd\Infrastructure\Eloquents\Item::class,
            'shop'   => \Wstd\Infrastructure\Eloquents\Shop::class,
            'vendor' => \Wstd\Infrastructure\Eloquents\Vendor::class,
        ]);
    }
}
