<?php

namespace Wstd\Equipment\View\Models\Traits;

use Illuminate\Support\Str;

trait UtilityTrait
{
    /**
     * ヘルパー関数 Str::camel のラッパー
     *
     * @param string $string
     * @return string
     */
    public function strCamelCase(string $string)
    {
        return Str::camel($string);
    }
}
