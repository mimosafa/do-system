<?php

namespace App\Traits\Kitchencar\Car;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Wstd\File\HolderTrait;

trait HasCarImagesTrait
{
    use HolderTrait;

    public function getImagesAttribute()
    {
        return $this->getFiles('car');
    }

    public function setUploadedFileAttribute(UploadedFile $file)
    {
        $this->addFile($file, 'car', 'public');
    }
}
