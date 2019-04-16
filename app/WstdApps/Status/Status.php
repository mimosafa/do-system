<?php

namespace Wstd\Status;

use MyCLabs\Enum\Enum;
use Illuminate\Support\Str;

class Status extends Enum
{
    const UNREGISTERED = 0;
    const REGISTERED   = 1;
    // const MORE_STATUS = 2;
    const ACTIVE       = 3;
    // const MORE_STATUS = 4;
    // const MORE_STATUS = 5;
    const INACTIVE     = 6;
    // const MORE_STATUS = 7;
    const SUSPENDED    = 8;
    const DEREGISTERED = 9;

    protected static $disabled = [
        // self::ACTIVE,
        // self::INACTIVE,
    ];

    /**
     * 一覧表示可能なステイタス定数の配列
     *
     * @var array[integer]
     */
    protected static $indexables = [
        self::REGISTERED,
        self::ACTIVE,
    ];

    protected $slags = [
        // 'UNREGISTERED' => 'unregistered',
        // 'ACTIVE'       => 'active',
        // 'INACTIVE'     => 'inactive',
        // 'DEREGISTERED' => 'deregistered',
    ];

    protected $labels = [
        // 'UNREGISTERED' => 'Unregistered',
        // 'ACTIVE'       => 'Active',
        // 'INACTIVE'     => 'Inactive',
        // 'DEREGISTERED' => 'Deregistered',
    ];

    /**
     * 定義されている全てのステイタスインスタンスの配列を取得
     *
     * @static
     * @access public
     *
     * @return array[static]
     */
    public static function all(): array
    {
        $array = [];
        foreach (self::toArray() as $value) {
            if (! in_array($value, static::$disabled)) {
                $array[] = new static($value);
            }
        }
        return $array;
    }

    /**
     * 一覧表示可能なステイタスの値を全て取得
     *
     * @static
     * @access public
     *
     * @return array[integer]
     */
    public static function getIndexableValues(): array
    {
        return static::$indexables;
    }

    public function getSlug(): string
    {
        $key = $this->getKey();
        return $this->slugs[$key] ?? Str::slug($key);
    }

    public function getLabel(): string
    {
        $key = $this->getKey();
        return $this->labels[$key] ?? Str::title($key);
    }

    public function __call($name, $arguments = [])
    {
        if (preg_match('/^is(.+)$/', $name, $match)) {
            /**
             * `is$Key` メソッドで equals 判定
             */
            $key = strtoupper(Str::snake($match[1]));
            if ($this->isValidKey($key)) {
                return $this->equals(static::__callStatic($key, []));
            }
        }

        throw new \BadMethodCallException("No method constant '$name' in class " . \get_called_class());
    }
}
