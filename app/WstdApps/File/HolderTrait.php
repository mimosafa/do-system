<?php

namespace Wstd\File;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Wstd\File\File;
use Wstd\File\Models\FileHolder;

trait HolderTrait
{
    /**
     * @var string
     */
    # protected $disk = 'public';

    /**
     * @var string
     */
    # protected $dir = 'files';

    /**
     * @var string
     */
    # protected $collection = '';

    /**
     * @var File
     */
    protected $filesInstance;

    public function fileHoldersMorphMany(): MorphMany
    {
        return $this->morphMany(FileHolder::class, 'holder');
    }

    protected static function bootHolderTrait()
    {
        static::retrieved(function($model) {
            $collection = $model->collection ?? '';
            $dir = $model->dir ?? '';
            $disk = $model->disk ?? '';
            $model->filesInstance = new File($model, $collection, $dir, $disk);
        });
    }

    /**
     * Property `files`
     */
    public function getFilesAttribute()
    {
        return $this->filesInstance->get();
    }
}
