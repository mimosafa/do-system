<?php

namespace Wstd\View\Presenters\Admin\Modules;

use Illuminate\Support\Str;
use Wstd\View\Presenters\Admin\Modules\Table;

class EntityTable extends Table
{
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
        parent::__construct($collection, $args);
        $this->initItemLabels();
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
}
