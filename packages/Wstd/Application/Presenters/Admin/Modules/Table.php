<?php

namespace Wstd\Application\Presenters\Admin\Modules;

use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;

class Table extends ViewModel
{
    /**
     * e.g. 'users'
     *
     * @var string
     */
    public $id;

    /**
     * List items
     *
     * @var array|Traversable/Countable/ArrayAccess
     */
    public $collection;

    /**
     * e.g. ['id', 'name', 'updated_at']
     *
     * @var array
     */
    public $items = [];

    /**
     * e.g. ['id' => 'ID', 'name' => 'Name', 'updated_at' => 'Updated Date']
     *
     * @var array
     */
    protected $itemLabels = [];

    /**
     * @see self::getTdMethod(string $item)
     * @static
     * @var array
     */
    protected static $tdMethods = [];

    /**
     * @var array
     */
    protected $ignore = [
        '__construct',
    ];

    /**
     * @param array|Traversable/Countable/ArrayAccess
     */
    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param string $item
     * @return string
     */
    public function thAttributes(string $item): string
    {
        $attr = '';
        if ($classes = $this->thClasses($item)) {
            $classStr = trim(implode(' ', $classes));
            $attr .= ' class="' . $classStr . '"';
        }
        return $attr;
    }

    /**
     * @param string $item
     * @return array
     */
    protected function thClasses(string $item): array
    {
        return ['th_' . $item];
    }

    /**
     * @param string $item
     * @return string
     */
    public function th(string $item): string
    {
        $th = $this->itemLabels[$item] ?? Str::title($item);
        return e($th);
    }

    /**
     * @param mixed $value
     * @return string
     */
    public function trAttributes($value): string
    {
        $attr = '';
        if ($classes = $this->trClasses($value)) {
            $classStr = trim(implode(' ', $classes));
            $attr .= ' class="' . e($classStr) . '"';
        }
        return $attr;
    }

    /**
     * @param mixed $value
     * @return array
     */
    protected function trClasses($value): array
    {
        return [];
    }

    /**
     * @param string $item
     * @param mixed $value
     * @return string
     */
    public function tdAttribute(string $item, $value): string
    {
        $attr = '';
        if ($classes = $this->tdClasses($item, $value)) {
            $classStr = trim(implode(' ', $classes));
            $attr .= ' class="' . e($classStr) . '"';
        }
        return $attr;
    }

    /**
     * @param string $item
     * @param mixed $value
     * @return string
     */
    protected function tdClasses(string $item, $value): array
    {
        return ['td_' . e($item)];
    }

    /**
     * @param string $item
     * @param mixed $value
     * @return string
     */
    public function td(string $item, $value): string
    {
        return (string) $value;
    }

    /**
     * @param string $item
     * @return callable|bool
     */
    public function getTdMethod(string $item)
    {
        if (! isset($this::$tdMethods[$item])) {
            $methodStr = 'td' . Str::studly($item);
            static::$tdMethods[$item] = method_exists($this, $methodStr) ? [$this, $methodStr] : false;
        }
        return $this::$tdMethods[$item];
    }

    /**
     * @return string
     */
    public function emptyMessage(): string
    {
        return 'Empty.';
    }

    /**
     * @return string
     */
    public function beforeTable(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function afterTable(): string
    {
        return '';
    }
}
