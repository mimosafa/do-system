<?php

namespace Wstd\Advertisement;

class Advertisement
{
    /**
     * @var integer|null
     */
    protected static $titleLength = 30;
    protected static $descriptionLength = 80;
    protected static $contentLength; // null

    /**
     * @var string
     */
    protected $title_primary;

    /**
     * @var string
     */
    protected $title_secondary;

    /**
     * @var string
     */
    protected $description_primary;

    /**
     * @var string
     */
    protected $description_secondary;

    /**
     * @var string
     */
    protected $content_primary;

    /**
     * @var string
     */
    protected $content_secondary;

    /**
     * @var array
     */
    protected $other_values;

    public function __construct(
        string $title_primary, string $title_secondary,
        string $description_primary, string $description_secondary,
        string $content_primary, string $content_secondary,
        array $other_values = []
    )
    {
        $this->title_primary   = static::titleFilter($title_primary);
        $this->title_secondary = static::titleFilter($title_secondary);
        $this->description_primary   = static::descriptionFilter($description_primary);
        $this->description_secondary = static::descriptionFilter($description_secondary);
        $this->content_primary   = static::contentFilter($content_primary);
        $this->content_secondary = static::contentFilter($content_secondary);
        $this->other_values = static::otherValuesFilter($other_values);
    }

    protected static function titleFilter(string $title): ?string
    {
        $len = (int) static::$titleLength;
        return mb_strlen($title) <= $len ? $title : null;
    }

    protected static function descriptionFilter(string $description): ?string
    {
        $len = (int) static::$descriptionLength;
        return mb_strlen($description) <= $len ? $description : null;
    }

    protected static function contentFilter(string $content): ?string
    {
        $len = (int) static::$contentLength;
        return mb_strlen($content) <= $len ? $content : null;
    }

    protected static function otherValuesFilter(array $other_values): ?array
    {
        return $other_values;
    }

    public function equals(self $advertisement): bool
    {
        //
        return false;
    }
}
