<?php

namespace App;

use App\Shop;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }
}
