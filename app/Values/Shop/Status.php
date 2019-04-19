<?php

namespace App\Values\Shop;

use Wstd\Status\Status as EnumStatus;

class Status extends EnumStatus
{
    protected static $enabled = [
        self::PROSPECTIVE,
        self::REGISTERED,
        self::DEREGISTERED,
    ];

    protected static $indexables = [
        self::PROSPECTIVE,
        self::REGISTERED,
    ];

    protected $labels = [
        'PROSPECTIVE'  => '提案',
        'REGISTERED'   => '承認済',
        'DEREGISTERED' => '終了',
    ];
}
