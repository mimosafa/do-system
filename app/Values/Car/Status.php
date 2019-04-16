<?php

namespace App\Values\Car;

use Wstd\Status\Status as EnumStatus;

class Status extends EnumStatus
{
    protected static $indexables = [
        'UNREGISTERED',
        'ACTIVE',
    ];

    protected $labels = [
        'UNREGISTERED' => '未登録',
        'ACTIVE'       => '登録済',
        'INACTIVE'     => '休止中',
        'DEREGISTERED' => '廃車/売却',
    ];
}
