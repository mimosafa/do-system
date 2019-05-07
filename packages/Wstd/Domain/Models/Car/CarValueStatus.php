<?php

namespace Wstd\Domain\Models\Car;

use Wstd\Equipment\Domain\Enums\Status;
use Wstd\Equipment\Domain\Traits\ValueObjectTrait;

final class CarValueStatus extends Status
{
    use ValueObjectTrait;

    protected static $enabled = [
        self::PROSPECTIVE,
        self::REGISTERED,
        self::SUSPENDED,
        self::DEREGISTERED,
    ];

    protected static $indexables = [
        self::PROSPECTIVE,
        self::REGISTERED,
        self::SUSPENDED,
    ];

    protected $labels = [
        'UNREGISTERED' => '未登録',
        'REGISTERED'   => '登録済',
        'SUSPENDED'    => '休止中',
        'DEREGISTERED' => '廃車/売却',
    ];
}
