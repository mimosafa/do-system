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
}
