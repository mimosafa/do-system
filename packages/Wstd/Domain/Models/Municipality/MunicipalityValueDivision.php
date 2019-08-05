<?php

namespace Wstd\Domain\Models\Municipality;

use Wstd\Domain\Models\ValueObjectEnum;
use Wstd\Domain\Modules\Models\AbstractValueEnum;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

final class MunicipalityValueDivision extends AbstractValueEnum implements ValueObjectEnum
{
    use ValueObjectTrait;

    const NAME = 'division';
    const LABEL = '地方公共団体区分';

    /**
     * Enum values
     */
    const SPECIAL_WARD    = 'special_ward';
    const DESIGNATED_CITY = 'designated_city';
    const WARD            = 'ward';
    const CORE_CITY       = 'core_city';
    const HEALTH          = 'health';
    const MEASUREMENT     = 'measurement';

    protected $labels = [
        'SPECIAL_WARD'     => '特別区',
        'DESIGNATED_CITY'  => '政令指定都市',
        'WARD'             => '行政区',
        'CORE_CITY'        => '中核市',
        'HEALTH'           => '保健所政令市',
        'MEASUREMENT'      => '計量特定市',
    ];

    protected static $excluded = [
        self::NAME,
        self::LABEL,
    ];
}
