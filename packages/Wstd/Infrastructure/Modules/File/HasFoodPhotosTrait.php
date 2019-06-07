<?php

namespace Wstd\Infrastructure\Modules\File;

use Illuminate\Support\Collection;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\Models\Media;

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
        return $this->foodPhotosCollectionName ?? 'foods';
    }

    public function setFoodPhotosAttribute($photos)
    {
        if (! is_array($photos) || $photos instanceof Collection) {
            throw new \InvalidArgumentException();
        }
        foreach ($photos as $i => $photo) {
            if (filter_var($photo, \FILTER_VALIDATE_INT)) {
                $photo = Media::find($photo);
            }
            if (! ($photo instanceof Media)) {
                throw new \InvalidArgumentException();
            }
            if ($photo->collection_name !== $this->getFoodPhotosCollectionName()) {
                throw new \InvalidArgumentException();
            }
            if ($photo->model_id !== $this->id) {
                throw new \InvalidArgumentException();
            }
            $photo->order_column = $i;
            $photo->save();
        }
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
