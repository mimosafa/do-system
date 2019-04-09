<?php

namespace App\Values\Vendor;

use App\Values\Enum;

class Status extends Enum
{
    const UNREGISTERED = 0;
    const ACTIVE       = 1;
    const INACTIVE     = 8;
    const DEREGISTERED = 9;

    private $attributes = [
        'UNREGISTERED' => ['label' => '未登録', 'class' => 'warning'],
        'ACTIVE'       => ['label' => '登録済', 'class' => 'primary'],
        'INACTIVE'     => ['label' => '休止中', 'class' => 'secondary'],
        'DEREGISTERED' => ['label' => '退会済', 'class' => 'dark'],
    ];

    public function getAttribute()
    {
        return $this->attributes[$this->getKey()];
    }

    public function getAttributes()
    {
        return $this->attributes;
    }
}
