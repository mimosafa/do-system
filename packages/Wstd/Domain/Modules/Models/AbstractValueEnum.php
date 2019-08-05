<?php

namespace Wstd\Domain\Modules\Models;

use MyCLabs\Enum\Enum;
use Illuminate\Support\Str;

/**
 * @method string getSlug()
 * @method string getLabel()
 * @method bool is{$Key}(mixed $var)
 * @method array static::toArray()
 *
 * @see MyCLabs\Enum\Enum
 * @method mixed getValue()
 * @method mixed getKey()
 * @method bool equals(mixed $valiable)
 * @method array static::keys()
 * @method static[] static::values()
 * @method bool static::isValid(mixed $value)
 * @method bool static::isValidKey(mixed $key)
 * @method mixed jsonSerialize()
 */
abstract class AbstractValueEnum extends Enum
{
    /**
     * Enums ...Define as like below.
     */
    # const NOT_KNOWN      = 0;
    # const MALE           = 1;
    # const FEMALE         = 2;
    # const NOT_APPLICABLE = 9;

    /**
     * Some cache
     *
     * @var array
     */
    protected static $statusCache = [];

    /**
     * Define slugs(url friendly names) for enums.
     * If undefined automatically exchanged.
     */
    protected $slags = [
        # 'NOT_KNOWN'      => 'fumei', // default: 'not-known'
        # 'MALE'           => 'otoko', // default: 'male'
        # 'FEMALE'         => 'onna',  // default: 'female'
        # 'NOT_APPLICABLE' => 'lgbtq', // default: 'not-applicable'
    ];

    /**
     * Define label strings(may be used in sentence or as title) for enums.
     * If undefined automatically exchanged.
     */
    protected $labels = [
        # 'NOT_KNOWN'      => '不明', // default: 'Not Known'
        # 'MALE'           => '男性', // default: 'Male'
        # 'FEMALE'         => '女性', // default: 'Female'
        # 'NOT_APPLICABLE' => '適用不能', // default: 'Not Applicable'
    ];

    /**
     * Specify the inherited class's own status variable not used as Enum.
     */
    protected static $excluded = [
        # self::MY_AWESOME_CLASS_CONSTANT,
    ];

    /**
     * Return slugs(url friendly names)
     *
     * @access public
     *
     * @return string
     */
    public function getSlug(): string
    {
        $key = $this->getKey();
        return $this->slugs[$key] ?? Str::slug($key, '-');
    }

    /**
     * Return label strings(may be used in sentence or as title)
     *
     * @access public
     *
     * @return string
     */
    public function getLabel(): string
    {
        $key = $this->getKey();
        return $this->labels[$key] ?? Str::title($key);
    }

    public function __call($name, $arguments = [])
    {
        if (preg_match('/^is(.+)$/', $name, $match)) {
            /**
             * Check equals by `is{$Key}` method
             *
             * @return bool
             */
            $key = strtoupper(Str::snake($match[1]));
            if ($this->isValidKey($key)) {
                return $this->equals(static::__callStatic($key, []));
            }
        }

        throw new \BadMethodCallException("No method constant '$name' in class " . \get_called_class());
    }

    /**
     * Overwrite MyCLabs\Enum\Enum::toArray
     *
     * @return array
     */
    public static function toArray()
    {
        $class = \get_called_class();
        if (! isset(static::$cache[$class])) {
            $array = array_filter(parent::toArray(), function($value, $key) {
                return ! in_array($key, static::$excluded, true);
            }, \ARRAY_FILTER_USE_BOTH);
            static::$cache[$class] = $array;
        }

        return static::$cache[$class];
    }

    /**
     * Overwrite MyCLabs\Enum\Enum::__toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getLabel();
    }
}
