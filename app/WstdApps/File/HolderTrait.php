<?php

namespace Wstd\File;

use Illuminate\Database\Eloquent\Relations\MorphMany;

use Wstd\File\File;

trait HolderTrait
{
    /**
     * @var File
     */
    protected $filesInstance;

    public function filesMorphMany(): MorphMany
    {
        return $this->morphMany(FileHolder::class, 'holder');
    }

    protected static function bootHolderTrait()
    {
        static::retrieved(function($model) {
            $model->filesInstance = new File($model);
        });
    }

    //
}
