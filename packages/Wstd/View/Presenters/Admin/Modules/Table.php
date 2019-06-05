<?php

namespace Wstd\View\Presenters\Admin\Modules;

use ArrayAccess;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Traversable;
use Wstd\View\Presenters\Presenter;

class Table extends Presenter
{
    /**
     * @var string|null
     */
    public $id;
    public $title;

    /**
     * List items
     *
     * @var array|Traversable
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

    protected $hiddenColumns = [];

    protected $hiddenMobileColumns = [];

    /**
     * Callbacks for item value display,
     * used by static::td() mrthod
     *
     * @var array[callable]
     */
    protected $callbacks = [];

    /**
     * Html attributes
     *
     * @var array
     */
    protected $attributes = [];

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
     * @see Wstd\View\Presenters\Presenter
     * @var array
     */
    protected $guarded = ['collection'];

    /**
     * @param array|Traversable
     * @param array $args
     */
    public function __construct($collection, array $args = [])
    {
        if (! is_array($collection)) {
            if (! is_object($collection) || ! ($collection instanceof Traversable)) {
                throw new \InvalidArgumentException();
            }
        }
        $this->collection = $collection;
        $this->parseArguments($args);
    }

    protected function parseArguments(array $args)
    {
        $items = Arr::pull($args, 'items', null);
        $itemLabels = (array) Arr::pull($args, 'itemLabels', []);
        if (is_array($items)) {
            if ($items !== array_values($items)) {
                foreach ($items as $item => $value) {
                    $this->items[] = $item;
                    if (is_string($value) && ! isset($itemLabels[$item])) {
                        $itemLabels[$item] = $value;
                    }
                }
            }
            else {
                $this->items = $items;
            }
        }
        if (! empty($itemLabels)) {
            $this->itemLabels = array_merge($itemLabels, $this->itemLabels);
        }
        parent::parseArguments($args);
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
        $array = ['table'];
        if (isset($this->attributes['table']) && isset($this->attributes['table']['class'])) {
            $classes = $this->attributes['table']['class'];
            if (is_string($classes)) {
                $classes = explode(' ', $classes);
            }
            if (is_array($classes)) {
                $array = array_merge($array, $classes);
            }
        }
        if ($this->isDataTable) {
            $array[] = 'dataTable';
        }
        return array_unique(array_filter($array));
    }

    public function tableAttributes(): string
    {
        $attr = '';
        if ($array = $this->tableAttributeArray()) {
            foreach ($array as $key => $value) {
                $attr .= ' ' . sprintf('%s="%s"', e($key), e(strval($value)));
            }
        }
        return $attr;
    }

    protected function tableAttributeArray():array
    {
        $attrs = [];
        if (isset($this->attributes['table'])) {
            foreach ($this->attributes['table'] as $key => $value) {
                if ($key === 'class') {
                    continue;
                }
                $attrs[$key] = $value;
            }
        }
        if (isset($this->id) && filter_var($this->id)) {
            $attrs['id'] = e($this->id);
        }
        return $attrs;
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
        $array = ['th_' . $item];
        if (isset($this->attributes['th']) && isset($this->attributes['th']['class'])) {
            $classes = $this->attributes['th']['class'];
            foreach (Arr::wrap($classes) as $class) {
                if (is_callable($class)) {
                    $array[] = (string) $class($item);
                    continue;
                }
                if (is_string($class)) {
                    $class = explode(' ', $class);
                }
                if (is_array($class)) {
                    $array = array_merge($array, $class);
                }
            }
        }
        if (in_array($item, $this->hiddenColumns, true)) {
            $array[] = 'hidden';
        }
        return array_unique(array_filter($array));
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
        $array = [];
        if (isset($this->attributes['tr']) && isset($this->attributes['tr']['class'])) {
            $class = $this->attributes['tr']['class'];
            if (is_callable($class)) {
                $array[] = (string) $class($value);
            }
            else if (is_string($class)) {
                $array = array_merge($array, explode(' ', $class));
            }
            else if (is_array($class)) {
                $array = array_merge($array, $class);
            }
        }
        return array_unique(array_filter($array));
    }

    /**
     * @param string $item
     * @param mixed $value
     * @return string
     */
    public function tdAttributes(string $item, $value): string
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
        $array = ['td_' . e($item)];
        if (in_array($item, $this->hiddenColumns, true)) {
            $array[] = 'hidden';
        }
        return $array;
    }

    /**
     * @param string $item
     * @param mixed $value
     * @return string
     */
    public function td(string $item, $value): string
    {
        if (isset($this->callbacks[$item])) {
            $callback = $this->callbacks[$item];
            if (is_callable($callback)) {
                return $callback($value);
            }
        }
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
        return '<p class="text-center h4">No items</p>';
    }
}
