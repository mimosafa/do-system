<?php

namespace App\FileApp;

use App\FileApp\Models\File;
use App\FileApp\Models\FileHolder;
use Illuminate\Http\UploadedFile;

trait FileHolderTrait
{
    public function files()
    {
        return $this->morphMany(FileHolder::class, 'holder');
    }
}
