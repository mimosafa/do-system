<?php

namespace Wstd\Application\Presenters;

use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;

class Blidge
{
    const BASE_NAME_SPACE = __NAMESPACE__;

    /**
     * Render presenter instance by Blade template
     *
     * @param Spatie\ViewModels\ViewModel $instance
     * @return \Illuminate\Http\Response
     */
    public static function view(ViewModel $instance)
    {
        return view(self::defineBladeName($instance), $instance);
    }

    /**
     * Define Blade template name by presenter instance
     *
     * @param Spatie\ViewModels\ViewModel $instance
     * @return string
     */
    protected static function defineBladeName(ViewModel $instance)
    {
        $namespace = substr(get_class($instance), strlen(self::BASE_NAME_SPACE) + 1);
        return implode('.', array_map('Str::camel', explode('\\', $namespace)));
    }
}
