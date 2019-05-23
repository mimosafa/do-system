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
