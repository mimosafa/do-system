<?php

namespace Wstd\View\Admin\Traits;

use Illuminate\Support\Str;

trait UtilityTrait
{
    /**
     * ヘルパー関数 Str::camel のラッパー
     *
     * @param string $string
     * @return string
     */
    public function strCamel(string $string)
    {
        return Str::camel($string);
    }

    /**
     * ヘルパー関数 Str::snake のラッパー
     *
     * @param string $string
     * @return string
     */
    public function strSnake(string $string)
    {
        return Str::snake($string);
    }

    /**
     * ヘルパー関数 Str::studly のラッパー
     *
     * @param string $string
     * @return string
     */
    public function strStudly(string $string)
    {
        return Str::studly($string);
    }

    /**
     * ヘルパー関数 Str::title のラッパー
     *
     * @param string $string
     * @return string
     */
    public function strTitle(string $string)
    {
        return Str::title($string);
    }
}
