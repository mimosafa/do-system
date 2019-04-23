<?php

namespace Wstd\File\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Wstd\File\Models\File;

class FileHolder extends Model
{
    protected $guarded = ['id'];

    public function fileBelongsTo(): BelongsTo
    {
        return $this->belongsTo(File::class, 'file_id');
    }

    public function holderMorphTo()
    {
        // return $this->morphTo();
    }

    /**
     * Overwrite Model::getAttribute
     */
    public function getAttribute($key)
    {
        return parent::getAttribute($key) ?? $this->fileBelongsTo->$key;
    }
}
