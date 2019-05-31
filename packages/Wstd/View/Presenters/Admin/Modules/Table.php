<?php

namespace Wstd\View\Presenters\Admin\Modules;

use ArrayAccess;
use Illuminate\Support\Str;
use Wstd\View\Presenters\Presenter;

class Table extends Presenter
{
    /**
     * e.g. 'users'
     *
     * @var string
     */
    public $id;

    public $collectionName;

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
     * @var bool
     */
    public $isDataTable = false;

    public $dataTableOptions = [];

    /**
     * Default Blade template
     *
     * @var string
     */
    public $template = 'admin.modules.table';

    /**
     * @see Spatie\ViewModels\ViewModel
     * @var array
     */
    protected $ignore = ['template'];

    /**
     * @param array|Traversable/Countable/ArrayAccess
     */
    public function __construct($collection, array $args = [])
    {
        $this->collection = $collection;
        if (! empty($args)) {
            $this->parseArguments($args);
        }
        if (! isset($this->collectionName)) {
            $this->collectionName = Str::title($this->id);
        }
    }

    public function tableClasses(): string
    {
        $classes = '';
        if ($array = $this->tableClassArray()) {
            $classes .= ' ' . implode(' ', $array);
        }
        return $classes;
    }

    protected function tableClassArray(): array
    {
        $classes = ['table'];
        if ($this->isDataTable) {
            $classes[] = 'dataTable';
        }
        return $classes;
    }

    public function tableMiscAttributes(): string
    {
        $attr = '';
        if ($array = $this->tableMiscAttributeArray()) {
            foreach ($array as $key => $value) {
                $attr .= ' ' . sprintf('%s="%s"', e($key), e(strval($value)));
            }
        }
        return $attr;
    }

    protected function tableMiscAttributeArray():array
    {
        return [];
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
        $method = 'get' . Str::studly($item);
        if (method_exists($this, $method)) {
            return $this->{$method}($value); // Unescaped!
        }
        if (is_object($value) && method_exists($value, $method)) {
            return e(strval($value->{$method}()));
        }
        if (is_array($value) || (is_object($value) && $value instanceof ArrayAccess)) {
            return isset($value[$item]) ? e(strval($value[$item])) : '';
        }
        else if (is_object($value)) {
            return isset($value->{$item}) ? e(strval($value->{$item})) : '';
        }
        return '';
    }

    /**
     * @return string
     */
    public function emptyMessage(): string
    {
        return 'No ' . $this->collectionName;
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
