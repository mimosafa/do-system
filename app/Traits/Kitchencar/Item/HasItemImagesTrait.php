<?php

namespace App\Traits\Kitchencar\Item;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Wstd\File\HolderTrait;

trait HasItemImagesTrait
{
    use HolderTrait;

    public function getImagesAttribute()
    {
        return $this->getFiles('item');
    }

    public function setUploadedFileAttribute(UploadedFile $file)
    {
        $this->addFile($file, 'item', 'public');
    }
}
