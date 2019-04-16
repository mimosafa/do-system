<?php

namespace App\Values\Vendor;

use Wstd\Status\Status as EnumStatus;

class Status extends EnumStatus
{
    protected static $indexables = [
        self::UNREGISTERED,
        self::ACTIVE,
    ];

    protected $labels = [
        'UNREGISTERED' => '未登録',
        'ACTIVE'       => '登録済',
        'INACTIVE'     => '休止中',
        'DEREGISTERED' => '退会済',
    ];
}
