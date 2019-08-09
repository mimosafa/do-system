<?php

namespace Wstd\Domain\Modules\Models;

use Illuminate\Support\Str;

trait CollectionTrait
{
    /**
     * @return string Name of collection
     */
    public static function collectionName(): string
    {
        if (defined(get_called_class() . '::NAME') && static::NAME) {
            return (string) static::NAME;
        }
        return Str::snake(class_basename(get_called_class()));
    }

    /**
     * @return string Label of collection
     */
    public static function collectionLabel(): string
    {
        if (defined(get_called_class() . '::LABEL') && static::LABEL) {
            return (string) static::LABEL;
        }
        return Str::title(static::collectionName());
    }
}
