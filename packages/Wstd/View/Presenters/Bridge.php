<?php

namespace Wstd\View\Presenters;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Spatie\ViewModels\ViewModel;

class Bridge
{
    const BASE_NAMESPACE = __NAMESPACE__;

    /**
     * Render presenter instance by Blade template
     *
     * @param Spatie\ViewModels\ViewModel $instance
     * @return \Illuminate\Http\Response
     */
    public static function view(ViewModel $instance)
    {
        return view(self::defineViewName($instance), $instance);
    }

    /**
     * Define Blade template name by presenter instance
     *
     * @param Spatie\ViewModels\ViewModel $instance
     * @return string
     */
    public static function defineViewName(ViewModel $instance)
    {
        $view = $instance->template ?? '';

        $className = get_class($instance);
        if (Str::startsWith($className, self::BASE_NAMESPACE)) {
            $namespace = substr($className, strlen(self::BASE_NAMESPACE) + 1);
            $sameHierarchyView = implode('.', array_map('Str::camel', explode('\\', $namespace)));
            if (View::exists($sameHierarchyView)) {
                return $sameHierarchyView;
            }
        }

        if (! $view) {
            throw new \Exception($className . ' has no view.');
        }
        if (! View::exists($view)) {
            throw new \Exception($view . ' dose not exist.');
        }

        return $view;
    }
}
