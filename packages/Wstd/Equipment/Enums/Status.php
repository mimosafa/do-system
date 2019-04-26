<?php

namespace Wstd\Equipment\Enums;

use MyCLabs\Enum\Enum;
use Illuminate\Support\Str;

/**
 * @see MyCLabs\Enum\Enum
 * @method int getValue()
 * @method bool equals($variable)
 * @method static array[self] values()
 * @method void __constract($value)
 * @method int jsonSerialize()
 */
abstract class Status extends Enum
{
    /**
     * 定義済み状態定数
     *
     * @var integer
     */
    const PROSPECTIVE  = 0; // 見込み
    const UNREGISTERED = 1; // 申請中
    const PENDING      = 2; // 保留中
    const REGISTERED   = 3; // 登録済
    const ACTIVE       = 4; // 活動中
    const INACTIVE     = 5; // 停滞中
    const LEAVING      = 6; // 撤退申請中
    const SUSPENDED    = 7; // 停止中
    const DEREGISTERED = 8; // 撤退
    const UNRELATED    = 9; // 無関係

    /**
     * 継承先のクラスで「使用する」ステータス定数
     * この配列か、 static::$disabled の *どちらかを* 定義する
     * こちらの方が優先される。(static::$disabled に指定されていても
     * こちらに含まれていると使用ということになる)
     *
     * @var array[integer]
     */
    protected static $enabled = [
        // self::UNREGISTERED,
        // self::REGISTERED,
        // self::DEREGISTERED,
    ];

    /**
     * 継承先のクラスで「使用しない」ステータス定数
     * この配列か、 static::$enabled の *どちらかを* 定義する
     * static::$enabled の方が優先される。(こちらに指定されていても
     * static::$enabled に含まれていると使用ということになる)
     *
     * @var array[integer]
     */
    protected static $disabled = [
        // self::ACTIVE,
        // self::INACTIVE,
    ];

    /**
     * この Status バリューを持つモデルが、拡張(編集)可能な範囲を指定
     *
     * @var array
     */
    protected static $expandableStatusRange = [
        'min' => self::REGISTERED,
        'max' => self::LEAVING,
    ];

    /**
     * Some cache
     *
     * @var array
     */
    protected static $statusCache = [];

    /**
     * 一覧表示可能なステイタス定数の配列
     *
     * @var array[integer]
     */
    protected static $indexables = [
        // self::REGISTERED,
        // self::ACTIVE,
        // self::INACTIVE,
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
     * 一覧表示可能なステイタスの値を全て取得
     *
     * @static
     * @access public
     *
     * @return array[integer]
     */
    public static function getIndexableValues(): array
    {
        return empty(static::$indexables) ? static::toArray() : static::$indexables;
    }

    /**
     * 拡張(編集)可能な Status バリューの配列を返す
     *
     * @static
     * @access public
     *
     * @return array[integer]
     */
    public static function getExpandableStatusValues(): array
    {
        $class = \get_called_class();
        if (! isset(static::$statusCache['expandable'])) {
            static::$statusCache['expandable'] = [];
        }
        if (! isset(static::$statusCache['expandable'][$class])) {
            $statuses = [];
            if (! empty(static::$expandableStatusRange)) {
                foreach (static::toArray() as $value) {
                    if (isset(static::$expandableStatusRange['min']) && is_integer(static::$expandableStatusRange['min'])) {
                        if ($value < static::$expandableStatusRange['min']) {
                            continue;
                        }
                    }
                    if (isset(static::$expandableStatusRange['max']) && is_integer(static::$expandableStatusRange['max'])) {
                        if ($value > static::$expandableStatusRange['max']) {
                            continue;
                        }
                    }
                    $statuses[] = $value;
                }
            }
            static::$statusCache['expandable'][$class] = $statuses;
        }

        return static::$statusCache['expandable'][$class];
    }

    /**
     * url フレンドリーな Status のスラッグを返す
     *
     * @access public
     *
     * @return string
     */
    public function getSlug(): string
    {
        $key = $this->getKey();
        return $this->slugs[$key] ?? Str::slug($key);
    }

    /**
     * Title フレンドリーな Status のラベルを返す
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
             * `is$Key` メソッドで equals 判定
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
     */
    public static function toArray()
    {
        $class = \get_called_class();
        if (! isset(static::$cache[$class])) {
            $array = array_filter(parent::toArray(), function($value) {
                return static::isEnabledStatus($value);
            });
            static::$cache[$class] = $array;
        }

        return static::$cache[$class];
    }

    protected static function isEnabledStatus(int $value): bool
    {
        if (! empty(static::$enabled)) {
            return in_array($value, static::$enabled, true);
        }
        return empty(static::$disabled) ? true : ! static::isDisabledStatus($value);
    }

    protected static function isDisabledStatus(int $value): bool
    {
        if (! empty(static::$disabled)) {
            return in_array($value, static::$disabled, true);
        }
        return empty(static::$enabled) ? false : ! static::isEnabledStatus($value);
    }
}
