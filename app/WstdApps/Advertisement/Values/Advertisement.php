<?php

namespace Wstd\Advertisement\Values;

use Illuminate\Contracts\Support\Arrayable;

final class Advertisement
{
    /**
     * @var integer|null
     */
    private static $titleLength = 30;
    private static $descriptionLength = 80;
    private static $contentLength; // null

    /**
     * @var string|null
     */
    private $title_primary;

    /**
     * @var string|null
     */
    private $title_secondary;

    /**
     * @var string|null
     */
    private $description_primary;

    /**
     * @var string|null
     */
    private $description_secondary;

    /**
     * @var string|null
     */
    private $content_primary;

    /**
     * @var string|null
     */
    private $content_secondary;

    /**
     * @var array|null
     */
    private $other_values;

    /**
     * @static
     * @access public
     *
     * @param Arrayable $arrayable
     * @return self
     */
    public static function instance(Arrayable $arrayable)
    {
        return self::instanceByArray($arrayable->toArray());
    }

    /**
     * @static
     * @access public
     *
     * @param array $array
     * @return self
     */
    public static function instanceByArray(array $array)
    {
        extract($array);
        return new self(
            $title_primary ?? null, $title_secondary ?? null,
            $description_primary ?? null, $description_secondary ?? null,
            $content_primary ?? null, $content_secondary ?? null,
            $other_values ?? null
        );
    }

    /**
     * Constructor
     *
     * @param string|null $title_primary
     * @param string|null $title_secondary
     * @param string|null $description_primary
     * @param string|null $description_secondary
     * @param string|null $content_primary
     * @param string|null $content_secondary
     * @param array|null $other_values
     */
    private function __construct(
        ?string $title_primary       = null, ?string $title_secondary       = null,
        ?string $description_primary = null, ?string $description_secondary = null,
        ?string $content_primary     = null, ?string $content_secondary     = null,
        ?array $other_values = null
    )
    {
        $this->title_primary = isset($title_primary) ? static::strFilter($title_primary, (int) self::$titleLength) : null;
        $this->title_secondary = isset($title_secondary) ? static::strFilter($title_secondary, (int) self::$titleLength) : null;
        $this->description_primary = isset($description_primary) ? static::strFilter($description_primary, (int) self::$descriptionLength) : null;
        $this->description_secondary = isset($description_secondary) ? static::strFilter($description_secondary, (int) self::$descriptionLength) : null;
        $this->content_primary = isset($content_primary) ? static::strFilter($content_primary, (int) self::$contentLength) : null;
        $this->content_secondary = isset($content_secondary) ? static::strFilter($content_secondary, (int) self::$contentLength) : null;
        $this->other_values = isset($other_values) ? static::otherValuesFilter($other_values) : null;
    }

    /**
     * @access private
     *
     * @param string $string
     * @param integer $len
     * @return string|null
     */
    private static function strFilter(string $string, int $len): ?string
    {
        if ($len) {
            return mb_strlen($string) <= $len ? $string : null;
        }
        return $string;
    }

    /**
     * @access private
     *
     * @param string $title
     * @return string|null
     */
    private static function titleFilter(string $title): ?string
    {
        $len = (int) static::$titleLength;
        return mb_strlen($title) <= $len ? $title : null;
    }

    /**
     * @access private
     *
     * @param string $description
     * @return string|null
     */
    private static function descriptionFilter(string $description): ?string
    {
        $len = (int) static::$descriptionLength;
        return mb_strlen($description) <= $len ? $description : null;
    }

    /**
     * @access private
     *
     * @param string $content
     * @return string|null
     */
    private static function contentFilter(string $content): ?string
    {
        $len = (int) static::$contentLength;
        return mb_strlen($content) <= $len ? $content : null;
    }

    /**
     * @access private
     *
     * @param array $other_values
     * @return array
     */
    private static function otherValuesFilter(array $other_values): array
    {
        return $other_values;
    }

    public function __get($key)
    {
        return $this->$key;
    }

    /**
     * @access public
     *
     * @return array
     */
    public function toArray(): array
    {
        return \get_object_vars($this);
    }

    /**
     * @access public
     *
     * @return bool
     */
    public function isNull(): bool
    {
        foreach ($this->toArray() as $value) {
            if (! is_null($value)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @access public
     *
     * @return bool
     */
    public function isNotNull(): bool
    {
        return ! $this->isNull();
    }

    /**
     * @access public
     *
     * @param self $advertisement
     * @return bool
     */
    public function isEquals(self $advertisement): bool
    {
        $here = $this->toArray();
        $there = $advertisement->toArray();
        foreach ($here as $key => $value) {
            if ($value !== $there[$key]) {
                return false;
            }
        }
        return true;
    }

    /**
     * @static
     * @access public
     *
     * @param self $a
     * @param self $b
     * @return bool
     */
    public static function equals(self $a, self $b): bool
    {
        return $a->isEquals($b);
    }
}
