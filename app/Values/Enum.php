<?php

namespace App\Values;

use MyCLabs\Enum\Enum as PhpEnum;
use Str;

abstract class Enum extends PhpEnum
{
    /**
     * `is$Key` メソッドで equals 判定
     */
    public function __call($name, $arguments = [])
    {
        if (preg_match('/^is(.+)$/', $name, $match)) {
            $key = strtoupper(Str::snake($match[1]));
            if ($this->isValidKey($key)) {
                return $this->equals(static::__callStatic($key, []));
            }
        }

        throw new \BadMethodCallException("No method constant '$name' in class " . \get_called_class());
    }
}
