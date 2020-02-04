<?php

namespace Wstd\Infrastructure\Modules\File;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

trait HasFilesTrait
{
    use HasMediaTrait;

    /**
     * @see https://github.com/spatie/laravel-medialibrary/issues/1120
     */
    public function registerMediaCollections()
    {
        foreach (\get_class_methods($this) as $method) {
            if (Str::startsWith($method, 'hasFileCollection')) {
                $this->{$method}();
            }
        }
    }
}
