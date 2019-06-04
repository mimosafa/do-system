<?php

namespace Wstd\Infrastructure\Modules\Files;

use Spatie\MediaLibrary\File;

trait HasFoodPhotosTrait
{
    /**
     * Mime Types accepted
     * @see https://developer.mozilla.org/ja/docs/Web/HTTP/Basics_of_HTTP/MIME_types#Image_types
     *
     * @var array
     */
    protected static $imagesAcceptableMimeTypes = [
        'image/gif',
        'image/jpeg',
        'image/png',
        'image/webp1',
        'image/svg+xml',
    ];

    /**
     * Define if you need
     *
     * @var string
     */
    # protected $imagesCollectionName = 'awesome_images';

    public function hasFileCollectionFoodPhotos()
    {
        $collectionName = $this->getFoodPhotosCollectionName();
        $acceptsFiles = static::$imagesAcceptableMimeTypes;

        $this
            ->addMediaCollection($collectionName)
            ->acceptsFile(function (File $file) use ($acceptsFiles) {
                return in_array($file->mimeType, $acceptsFiles, true);
            })
            ->registerMediaConversions(function () {
                $this
                    ->addMediaConversion('thumb')
                    ->width('240')
                    ->height('240')
                ;
            })
        ;
    }

    /**
     * Return name of images collection
     *
     * @return string
     */
    protected function getFoodPhotosCollectionName(): string
    {
        return $this->imagesCollectionName ?? 'foods';
    }

    /**
     * Images collection getter
     */
    public function getFoodPhotosAttribute()
    {
        return $this->getMedia($this->getFoodPhotosCollectionName());
    }

    /**
     * @param string|Symfony\Component\HttpFoundation\File\UploadedFile $file
     */
    public function setFoodPhotoAttribute($file)
    {
        $this->addMedia($file)->toMediaCollection($this->getFoodPhotosCollectionName());

        return $this;
    }
}
