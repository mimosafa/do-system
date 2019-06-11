<?php

namespace Wstd\View\Presenters\Admin;

use Illuminate\Support\HtmlString;
use Wstd\Domain\Models\CollectionInterface;
use Wstd\Domain\Models\vendor\VendorValueStatus;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Admin\Includes\TableForVendors;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Modules\FormContainer;
use Wstd\View\Presenters\Admin\Templates\Index;

class VendorsIndex extends Index
{
    /**
     * @var string
     */
    public $id = 'vendors';

    /**
     * @var string
     */
    public $title = '事業者一覧';

    /**
     * @var array
     */
    protected $items = [
        'id',
        'name',
        'status',
    ];

    /**
     * @var Wstd\View\Presenters\Admin\Modules\FormContainer
     */
    public $filter;

    /**
     * @var array[int]
     */
    protected $indexedStatuses = [];

    public function __construct(CollectionInterface $collection, array $args = [])
    {
        parent::__construct($collection, $args);
        $this->filter = $this->initFilter();
    }

    protected function initTableInstance(CollectionInterface $collection): EntitiesTable
    {
        $isDataTable = true;
        $items = $this->items;
        $dataTableOptions = [
            'pageLength' => 100,
        ];

        return new TableForVendors($collection, compact(
            'isDataTable', 'items', 'dataTableOptions'
        ));
    }

    protected function initFilter()
    {
        $statuses = VendorValueStatus::values();
        $options = [];
        foreach ($statuses as $status) {
            $options[$status->getValue()] = $status->getLabel();
        }

        $form = FormFactory::makeCheckboxes($options, [
            'label' => 'Filter by ' . VendorValueStatus::valueObjectLabel(),
            'labelClass' => 'checkbox-inline',
            'value' => $this->indexedStatuses,
            'name' => 'status',
        ]);

        return new FormContainer($form, [
            'id' => $this->id . '_filter',
            'title' => 'Filter ' . $this->title,
        ]);
    }

    public function title()
    {
        if (! isset($this->filter)) {
            return $this->title;
        }

        $target = e($this->id . '_filter');
        $toggle = <<<TGGL
        <small>
            <a href="#" data-toggle="modal" data-target="#{$target}">
                <i class="fa fa-filter"></i>
            </a>
        </small>
TGGL;
        return new HtmlString(e($this->title) . $toggle);
    }
}
