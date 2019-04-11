<?php

namespace App;

use App\Brand;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }
}
