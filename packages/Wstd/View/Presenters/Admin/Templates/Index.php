<?php

namespace Wstd\View\Presenters\Admin\Templates;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Wstd\Domain\Models\CollectionInterface;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Modules\FormContainer;
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
     * @var Wstd\View\Presenters\Admin\Modules\FormContainer
     */
    public $filter;

    /**
     * @var string
     */
    protected $filterTitle;

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
        $this->parseArguments($args);
        $this->tableInstance = $this->initTableInstance($collection);
        $this->filter = $this->initFilter();
    }

    /**
     * @return Wstd\View\Presenters\Modules\EntitiesTable
     */
    abstract protected function initTableInstance(CollectionInterface $collection): EntitiesTable;

    /**
     * @return array[Illuminate\Contracts\Support\Htmlable]|Illuminate\Contracts\Support\Htmlable
     */
    # protected function initFilterForms(){}

    protected function initFilter()
    {
        if (method_exists($this, 'initFilterForms')) {
            $form = $this->initFilterForms();
            $id = $this->filterId();
            $title = $this->filterTitle ?? 'Filter ' . $this->title;

            return new FormContainer($form, compact('id', 'title'));
        }
        return null;
    }

    /**
     * @see resources/view/admin/templates/base.blade.php
     *
     * @return null|Illuminate\Support\HtmlString
     */
    public function titleAddon()
    {
        if (! isset($this->filter)) {
            return null;
        }

        $target = $this->filterId();
        $toggle = <<<TGGL
        <small>
            <a href="#" data-toggle="modal" data-target="#{$target}">
                <i class="fa fa-filter"></i>
            </a>
        </small>
TGGL;
        return new HtmlString($toggle);
    }

    /**
     * Modal element id for filter table
     *
     * @return string
     */
    protected function filterId()
    {
        return e($this->id . '_filter');
    }
}
