<?php

namespace App\Values\Car;

use Wstd\Status\Status as EnumStatus;

class Status extends EnumStatus
{
    protected static $disabled = [
        self::ACTIVE,
        self::INACTIVE,
    ];

    protected static $indexables = [
        self::UNREGISTERED,
        self::REGISTERED,
    ];

    protected $labels = [
        'UNREGISTERED' => '未登録',
        'REGISTERED'   => '登録済',
        'SUSPENDED'    => '休止中',
        'DEREGISTERED' => '廃車/売却',
    ];
}
