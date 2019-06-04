<?php

namespace Wstd\Application\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \Wstd\Domain\Models\Car\CarRepositoryInterface::class,
            \Wstd\Infrastructure\Repositories\CarRepository::class
        );

        $this->app->singleton(
            \Wstd\Domain\Models\Item\ItemRepositoryInterface::class,
            \Wstd\Infrastructure\Repositories\ItemRepository::class
        );

        $this->app->singleton(
            \Wstd\Domain\Models\Shop\ShopRepositoryInterface::class,
            \Wstd\Infrastructure\Repositories\ShopRepository::class
        );

        $this->app->singleton(
            \Wstd\Domain\Models\Vendor\VendorRepositoryInterface::class,
            \Wstd\Infrastructure\Repositories\VendorRepository::class
        );
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
