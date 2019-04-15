<?php

namespace Wstd\File\Models;

use Illuminate\Database\Eloquent\Model;

class FileHolder extends Model
{
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
