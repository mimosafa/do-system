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
