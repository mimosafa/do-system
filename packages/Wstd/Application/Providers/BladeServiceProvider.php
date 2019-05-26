<?php

namespace Wstd\Application\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeServiceProvider extends ServiceProvider
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
        /**
         * @see Wstd\View\Presenters\Bridge
         */
        Blade::directive('presenter', function ($expression) {
            return "<?php echo \$__env->make(\Wstd\View\Presenters\Bridge::defineViewName({$expression}), $expression, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>";
        });
    }
}
