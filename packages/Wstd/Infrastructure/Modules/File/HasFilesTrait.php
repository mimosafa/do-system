<?php

namespace Wstd\Infrastructure\Modules\File;

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
            if (starts_with($method, 'hasFileCollection')) {
                $this->{$method}();
            }
        }
    }
}
