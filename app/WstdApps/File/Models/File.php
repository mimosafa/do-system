<?php

namespace Wstd\File\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function holders()
    {
        return $this->hasMany(FileHolder::class);
    }
}
