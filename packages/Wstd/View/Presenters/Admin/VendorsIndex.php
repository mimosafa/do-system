<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\CollectionInterface;
use Wstd\Domain\Models\Vendor\VendorValueStatus;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Admin\Includes\TableForVendors;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
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
     * @var array[int]
     */
    protected $indexedStatuses = [];

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

    protected function initFilterForms()
    {
        $statuses = VendorValueStatus::values();
        $options = [];
        foreach ($statuses as $status) {
            $options[$status->getValue()] = $status->getLabel();
        }

        return FormFactory::makeCheckboxes($options, [
            'label' => 'Filter by ' . VendorValueStatus::valueObjectLabel(),
            'labelClass' => 'checkbox-inline',
            'value' => $this->indexedStatuses,
            'name' => 'status',
        ]);
    }
}
