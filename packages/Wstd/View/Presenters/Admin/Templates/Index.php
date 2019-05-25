<?php

namespace Wstd\View\Presenters\Admin\Templates;

use Illuminate\Support\Str;
use Wstd\View\Presenters\Admin\Modules\Table;

class Index extends Table
{
    /**
     * e.g. 'Users List'
     *
     * @var string
     */
    public $title;

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

    protected function tableMiscAttributeArray()
    {
        $attrs = [];
        if ($this->isDataTable) {
            $attrs['data-page-length'] = '100';
        }
        return $attrs;
    }

    /**
     * Overwrite Table::td()
     *
     * @param string $item
     * @param Wstd\Domain\Models\EntityInterface $entity
     * @return string
     */
    public function td(string $item, $entity): string
    {
        $method = 'get' . Str::studly($item);
        if (method_exists($entity, $method)) {
            return e(strval($entity->{$method}()));
        }
        return $entity->{$item} ? e(strval($entity->{$item})) : '';
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
}
