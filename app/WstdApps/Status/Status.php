<?php

namespace Wstd\Status;

use MyCLabs\Enum\Enum;
use Illuminate\Support\Str;

class Status extends Enum
{
    const UNREGISTERED = 0;
    const ACTIVE       = 1;
    const INACTIVE     = 8;
    const DEREGISTERED = 9;

    /**
     * 一覧表示可能なステイタス定数の配列
     *
     * @var array[string]
     */
    protected static $indexables = ['ACTIVE'];

    protected $slags = [];

    protected $labels = [];

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
        return array_map(function($value) {
            return new static($value);
        }, static::values());
    }

    /**
     * 一覧表示可能なステイタスの値を全て取得
     *
     * @static
     * @access public
     *
     * @return array[integer]
     */
    public static function indexableValues(): array
    {
        $values = [];

        foreach (static::toArray() as $key => $value) {
            if (in_array($key, static::$indexables)) {
                $values[] = $value;
            }
        }

        return $values;
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
