<?php

namespace Wstd\Domain\Models\Car;

use Wstd\Domain\Models\ValueObjectEnum;
use Wstd\Domain\Modules\Models\AbstractValueStatus;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

final class CarValueStatus extends AbstractValueStatus implements ValueObjectEnum
{
    use ValueObjectTrait;

    const NAME = 'status';

    const LABEL = '状態';

    protected static $enabled = [
        self::UNREGISTERED,
        self::REGISTERED,
        self::SUSPENDED,
        self::DEREGISTERED,
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
