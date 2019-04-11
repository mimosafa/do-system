<?php

namespace App\FileApp\Models;

use App\FileApp\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class FileHolder extends Model
{
    protected $fillable = ['file_id'];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function holder()
    {
        return $this->morphTo();
    }
}
