<?php

namespace Wstd\Application\Providers;

use Illuminate\Support\ServiceProvider;

class CollectionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \Wstd\Domain\Models\Car\CarCollectionInterface::class,
            \Wstd\Domain\Models\Car\CarCollection::class
        );

        $this->app->bind(
            \Wstd\Domain\Models\Shop\ShopCollectionInterface::class,
            \Wstd\Domain\Models\Shop\ShopCollection::class
        );

        $this->app->bind(
            \Wstd\Domain\Models\Vendor\VendorCollectionInterface::class,
            \Wstd\Domain\Models\Vendor\VendorCollection::class
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
