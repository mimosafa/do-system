<?php

namespace Wstd\Domain\Models\Vendor;

use Wstd\Domain\Models\ValueObjectEnum;
use Wstd\Domain\Modules\Models\AbstractValueStatus;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

/**
 * @see MyCLabs\Enum\Enum
 * @method int getValue()
 * @method bool equals($variable)
 * @method static array[self] values()
 * @method void __constract($value)
 * @method int jsonSerialize()
 *
 * @see Wstd\Equipment\Enums\Status
 * @method string getSlug()
 * @method string getLabel()
 * @method static array toArray()
 * @method static array[int] getIndexableValues()
 * @method static array[int] getExpandableStatusValues()
 * @see Wstd\Equipment\Enums\Status::__call
 * @method bool is{$CamelCaseStatusKey}()
 *
 * @see Wstd\Equipment\Traits\ValueObjectTrait
 * @method static self of($value)
 */
final class VendorValueStatus extends AbstractValueStatus implements ValueObjectEnum
{
    use ValueObjectTrait;

    /**
     * @var array[int]
     * @see Wstd\Equipment\Enums\Status
     */
    protected static $enabled = [
        self::UNREGISTERED,
        self::REGISTERED,
        self::SUSPENDED,
        self::DEREGISTERED,
    ];

    /**
     * @var array[int]
     * @see Wstd\Equipment\Enums\Status
     */
    protected static $indexables = [
        self::UNREGISTERED,
        self::REGISTERED,
        self::SUSPENDED,
    ];

    protected $labels = [
        'UNREGISTERED' => '未登録',
        'REGISTERED'   => '登録済',
        'SUSPENDED'    => '休止中',
        'DEREGISTERED' => '退会済',
    ];
}
