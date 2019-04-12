<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = [
        'title_primary', 'title_secondary',
        'description_primary', 'description_secondary',
        'content_primary', 'content_secondary',
    ];

    public function advertisable()
    {
        return $this->morphTo();
    }
}
