<?php

namespace Wstd\View\Presenters\Admin\Templates;

use Illuminate\Support\Str;
use Wstd\View\Presenters\Admin\Modules\EntityTable;

abstract class Index extends EntityTable
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

    /**
     * @param Wstd\Domain\Models\CollectionInterface
     * @param array $args
     */
    public function __construct($collection, array $args = [])
    {
        parent::__construct($collection, $args);
        $this->initTitle();
    }

    protected function tableMiscAttributeArray(): array
    {
        $attrs = [];
        if ($this->isDataTable) {
            $attrs['data-page-length'] = '100';
        }
        return $attrs;
    }

    protected function initTitle()
    {
        if (! $this->title || ! is_string($this->title)) {
            $this->title = $this->collectionName;
        }
    }
}
