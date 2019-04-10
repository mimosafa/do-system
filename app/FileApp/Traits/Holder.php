<?php

namespace App\FileApp\Traits;

use App\FileApp\File;
use App\FileApp\FileHolder;
use Illuminate\Http\UploadedFile;

trait Holder
{
    public function files()
    {
        return $this->morphMany(FileHolder::class, 'holder');
    }

    public function setUploadedFileAttribute(UploadedFile $uploaded_file)
    {
        $file = new File();
        $file->disk = 'public';
        $file->uploaded_file = $uploaded_file;
        $file->save();

        $this->files()->create([
            'file_id' => $file->id,
        ]);
        return $this;
    }
}
