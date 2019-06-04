<?php

namespace Wstd\Domain\Models\Item;

use Wstd\Domain\Models\ValueObjectEnum;
use Wstd\Domain\Modules\Models\AbstractValueStatus;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

final class ItemValueStatus extends AbstractValueStatus implements ValueObjectEnum
{
    use ValueObjectTrait;

    const NAME = 'status';
    const LABEL = '提供状況';

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
        'REGISTERED'   => '提供可能',
        'DEREGISTERED' => '提供終了',
    ];
}
