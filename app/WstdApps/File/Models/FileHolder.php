<?php

namespace Wstd\File\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FileHolder extends Model
{
    protected $guarded = ['id'];

    public function fileBelongsTo(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }
}
