<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    /**
     * 状態定義
     */
    const STATUS = [
        0 => ['label' => '未登録', 'class' => 'label-warning'],
        1 => ['label' => '登録済み', 'class' => 'label-info'],
        8 => ['label' => '休止中', 'class' => 'label-muted'],
        9 => ['label' => '退会済み', 'class' => 'label-muted'],
    ];

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
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }
}
