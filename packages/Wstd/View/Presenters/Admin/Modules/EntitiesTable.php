<?php

namespace Wstd\View\Presenters\Admin\Modules;

use Illuminate\Support\Str;
use Wstd\Domain\Models\CollectionInterface;
use Wstd\View\Presenters\Admin\Modules\Table;

class EntitiesTable extends Table
{
    /**
     * @var string
     */
    public $id;
    public $title;

    /**
     * @var Wstd\Domain\Models\CollectionInterface
     */
    public $collection;

    /**
     * @param Wstd\Domain\Models\CollectionInterface
     * @param array $args
     */
    public function __construct($collection, array $args = [])
    {
        if (! is_object($collection) || ! ($collection instanceof CollectionInterface)) {
            throw new \InvalidArgumentException();
        }
        parent::__construct($collection, $args);
    }

    protected function parseArguments(array $args)
    {
        parent::parseArguments($args);
        $this->initItemLabels();
        if (! isset($this->id)) {
            $this->id = $this->collection::collectionName();
        }
        if (! isset($this->title)) {
            $this->title = $this->collection::collectionLabel();
        }
    }

    protected function initItemLabels()
    {
        foreach ($this->items as $item) {
            if (isset($this->itemLabels[$item]) && $this->itemLabels[$item]) {
                continue;
            }
            if (! isset($prefix)) {
                if (! $prefix = $this->maybeEntityClassString()) {
                    break;
                }
            }
            $className = $prefix . 'Value' . Str::studly($item);
            if (! class_exists($className)) {
                continue;
            }
            $callback = $className . '::valueObjectLabel';
            if (is_callable($callback)) {
                $this->itemLabels[$item] = $callback();
            }
        }
    }

    protected function maybeEntityClassString()
    {
        $collectionClass = get_class($this->collection);
        $maybeEntityClass = substr($collectionClass, 0, strlen('Collection') * -1);

        return class_exists($maybeEntityClass) ? $maybeEntityClass : '';
    }

    /**
     * @return string
     */
    public function emptyMessage(): string
    {
        return '<p class="text-center h4">No ' . e($this->title) . '</p>';
    }
}
