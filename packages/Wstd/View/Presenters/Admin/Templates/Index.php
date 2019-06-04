<?php

namespace Wstd\View\Presenters\Admin\Templates;

use Illuminate\Support\Str;
use Wstd\Domain\Models\CollectionInterface;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\IdentifiedPresenter;

abstract class Index extends IdentifiedPresenter
{
    /**
     * e.g. users
     *
     * @var string
     */
    public $id;

    /**
     * @var string Index page title
     */
    public $title;

    /**
     * @var Wstd\View\Presenters\Modules\EntitiesTable;
     */
    public $tableInstance;

    /**
     * Default Blade template
     *
     * @var string
     */
    public $template = 'admin.templates.index';

    /**
     * Overwrite Wstd\View\Presenters\Presenter::__construct()
     *
     * @param Wstd\Domain\Models\CollectionInterface $collection
     * @param array $args
     */
    public function __construct(CollectionInterface $collection, array $args = [])
    {
        $this->tableInstance = $this->initTableInstance($collection);
        $this->parseArguments($args);
    }

    /**
     * @return Wstd\View\Presenters\Modules\EntitiesTable
     */
    abstract protected function initTableInstance(CollectionInterface $collection): EntitiesTable;
}
