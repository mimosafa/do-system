<?php

namespace Wstd\Domain\Models\Car;

use Wstd\Domain\Models\ValueObjectInterface;
use Wstd\Domain\Modules\Models\AbstractValueStatus;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

final class CarValueStatus extends AbstractValueStatus implements ValueObjectInterface
{
    use ValueObjectTrait;

    protected static $enabled = [
        self::UNREGISTERED,
        self::REGISTERED,
        self::SUSPENDED,
        self::DEREGISTERED,
    ];

    protected static $indexables = [
        self::UNREGISTERED,
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
