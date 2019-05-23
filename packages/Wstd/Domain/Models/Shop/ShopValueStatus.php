<?php

namespace Wstd\Domain\Models\Shop;

use Wstd\Domain\Models\ValueObjectEnum;
use Wstd\Domain\Modules\Models\AbstractValueStatus;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

final class ShopValueStatus extends AbstractValueStatus implements ValueObjectEnum
{
    use ValueObjectTrait;

    const NAME = 'status';
    const LABEL = '状態';

    protected static $enabled = [
        self::UNREGISTERED,
        self::REGISTERED,
        self::DEREGISTERED,
    ];

    protected static $indexables = [
        self::UNREGISTERED,
        self::REGISTERED,
    ];

    protected $labels = [
        'UNREGISTERED' => '提案',
        'REGISTERED'   => '承認済',
        'DEREGISTERED' => '終了',
    ];
}
