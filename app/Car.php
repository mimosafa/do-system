<?php

namespace App;

use App\Vendor;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * 状態定義
     */
    const STATUS = [
        0 => ['label' => '未登録', 'class' => 'label-warning'],
        1 => ['label' => '登録済み', 'class' => 'label-info'],
        8 => ['label' => '休止中', 'class' => 'label-muted'],
        9 => ['label' => '登録抹消', 'class' => 'label-muted'],
    ];

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }

    public function getStatusLabelAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['class'];
    }
}
