<?php

namespace Wstd\Infrastructure\Modules\Files;

use Spatie\MediaLibrary\File;

trait HasImagesTrait
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

    public function hasFileCollectionImages()
    {
        $collectionName = $this->getImagesCollectionName();
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
    protected function getImagesCollectionName(): string
    {
        return $this->imagesCollectionName ?? 'images';
    }

    /**
     * Images collection getter
     */
    public function getImagesAttribute()
    {
        return $this->getMedia($this->getImagesCollectionName());
    }
}
