<?php

namespace Wstd\File\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class File extends Model
{
    public function fileHoldersHasMany(): HasMany
    {
        return $this->hasMany(FileHolder::class);
    }
}
