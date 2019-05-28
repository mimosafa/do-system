<?php

namespace Wstd\View\Presenters\Admin\Templates;

use Illuminate\Support\Str;
use Wstd\View\Presenters\Admin\Modules\Table;

abstract class Index extends Table
{
    /**
     * e.g. 'Users List'
     *
     * @var string
     */
    public $title;

    /**
     * @var Wstd\Domain\Models\CollectionInterface
     */
    public $collection;

    /**
     * @var bool
     */
    public $isDataTable = true;

    /**
     * Default Blade template
     *
     * @var string
     */
    public $template = 'admin.templates.index';

    /**
     * @param Wstd\Domain\Models\CollectionInterface
     * @param array $args
     */
    public function __construct($collection, array $args = [])
    {
        parent::__construct($collection, $args);
        $this->initItemLabels();
    }

    protected function tableMiscAttributeArray(): array
    {
        $attrs = [];
        if ($this->isDataTable) {
            $attrs['data-page-length'] = '100';
        }
        return $attrs;
    }

    /**
     * Overwrite emptyMessage::td()
     *
     * @return string
     */
    public function emptyMessage(): string
    {
        return e($this->title) . ' Is Empty.';
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
