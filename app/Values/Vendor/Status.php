<?php

namespace App\Values\Vendor;

use Wstd\Status\Status as EnumStatus;

class Status extends EnumStatus
{
    protected static $enabled = [
        self::PROSPECTIVE,
        self::REGISTERED,
        self::SUSPENDED,
        self::DEREGISTERED,
    ];

    protected static $indexables = [
        self::PROSPECTIVE,
        self::REGISTERED,
    ];

    protected $labels = [
        'UNREGISTERED' => '未登録',
        'REGISTERED'   => '登録済',
        'SUSPENDED'    => '休止中',
        'DEREGISTERED' => '退会済',
    ];
}
