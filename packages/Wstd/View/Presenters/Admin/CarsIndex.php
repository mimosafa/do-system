<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\Car\CarValueStatus;
use Wstd\Domain\Models\CollectionInterface;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Admin\Includes\TableForCars;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Templates\Index;

class CarsIndex extends Index
{
    /**
     * @var string
     */
    public $id = 'cars';

    /**
     * @var string
     */
    public $title = '車両一覧';

    /**
     * @var array
     */
    public $items = [
        'vendor_id',
        'thumb',
        'vendor',
        'name',
        'vin',
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

        return new TableForCars($collection, compact(
            'isDataTable', 'items', 'dataTableOptions', 'hiddenColumns'
        ));
    }

    protected function initFilterForms()
    {
        $statuses = CarValueStatus::values();
        $options = [];
        foreach ($statuses as $status) {
            $options[$status->getValue()] = $status->getLabel();
        }

        return FormFactory::makeCheckboxes($options, [
            'label' => 'Filter by ' . CarValueStatus::valueObjectLabel(),
            'labelClass' => 'checkbox-inline',
            'value' => $this->indexedStatuses,
            'name' => 'status',
        ]);
    }
}
