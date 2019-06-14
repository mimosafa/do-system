<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\Item\ItemValueStatus;
use Wstd\Domain\Models\CollectionInterface;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Admin\Includes\TableForItems;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Templates\Index;

class ItemsIndex extends index
{
    /**
     * @var string
     */
    public $id = 'items';

    /**
     * @var string
     */
    public $title = '商品一覧';

    public $items = [
        'vendor_id',
        'thumb',
        'vendor',
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
            'columnDefs' => [
                [
                    'width' => 125,
                    'targets' => 1,
                ]
            ],
        ];
        $hiddenColumns = ['vendor_id'];

        return new TableForItems($collection, compact(
            'isDataTable', 'items', 'dataTableOptions', 'hiddenColumns'
        ));
    }

    protected function initFilterForms()
    {
        $statuses = ItemValueStatus::values();
        $options = [];
        foreach ($statuses as $status) {
            $options[$status->getValue()] = $status->getLabel();
        }

        return FormFactory::makeCheckboxes($options, [
            'label' => 'Filter by ' . ItemValueStatus::valueObjectLabel(),
            'labelClass' => 'checkbox-inline',
            'value' => $this->indexedStatuses,
            'name' => 'status',
        ]);
    }
}
