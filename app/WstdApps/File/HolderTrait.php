<?php

namespace Wstd\File;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Wstd\File\Files;
use Wstd\File\Models\FileHolder;

trait HolderTrait
{
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
            $model->filesInstance = new Files($model);
        });
    }

    public function getFiles(string $collection = '')
    {
        return $this->filesInstance->get($collection);
    }

    public function addFile(UploadedFile $file, string $collection = '', string $disk = '')
    {
        $this->filesInstance->add($file, $collection, $disk);
    }
}
