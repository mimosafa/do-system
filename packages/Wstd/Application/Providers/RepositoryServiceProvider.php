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
            \Wstd\Domain\Models\Brand\BrandRepositoryInterface::class,
            \Wstd\Infrastructure\Repositories\BrandRepository::class
        );

        $this->app->singleton(
            \Wstd\Domain\Models\BusinessArea\BusinessAreaRepositoryInterface::class,
            \Wstd\Infrastructure\Repositories\BusinessAreaRepository::class
        );

        $this->app->singleton(
            \Wstd\Domain\Models\BusinessPermit\BusinessPermitRepositoryInterface::class,
            \Wstd\Infrastructure\Repositories\BusinessPermitRepository::class
        );

        $this->app->singleton(
            \Wstd\Domain\Models\Car\CarRepositoryInterface::class,
            \Wstd\Infrastructure\Repositories\CarRepository::class
        );

        $this->app->singleton(
            \Wstd\Domain\Models\HealthCenter\HealthCenterRepositoryInterface::class,
            \Wstd\Infrastructure\Repositories\HealthCenterRepository::class
        );

        $this->app->singleton(
            \Wstd\Domain\Models\Item\ItemRepositoryInterface::class,
            \Wstd\Infrastructure\Repositories\ItemRepository::class
        );

        $this->app->singleton(
            \Wstd\Domain\Models\Municipality\MunicipalityRepositoryInterface::class,
            \Wstd\Infrastructure\Repositories\MunicipalityRepository::class
        );

        $this->app->singleton(
            \Wstd\Domain\Models\Prefecture\PrefectureRepositoryInterface::class,
            \Wstd\Infrastructure\Repositories\PrefectureRepository::class
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
