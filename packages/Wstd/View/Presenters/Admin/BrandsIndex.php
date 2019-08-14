<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\CollectionInterface;
use Wstd\Domain\Models\Brand\BrandValueStatus;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Admin\Includes\TableForBrands;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Templates\Index;

class BrandsIndex extends Index
{
    /**
     * @var string
     */
    public $id = 'brands';

    /**
     * @var string
     */
    public $title = 'ブランド一覧';

    /**
     * @var array
     */
    public $items = [
        'vendor_id',
        'thumb',
        'vendor',
        'name',
        'items',
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

        return new TableForBrands($collection, compact(
            'isDataTable', 'items', 'dataTableOptions', 'hiddenColumns'
        ));
    }

    protected function initFilterForms()
    {
        $statuses = BrandValueStatus::values();
        $options = [];
        foreach ($statuses as $status) {
            $options[$status->getValue()] = $status->getLabel();
        }

        return FormFactory::makeCheckboxes($options, [
            'label' => 'Filter by ' . BrandValueStatus::valueObjectLabel(),
            'labelClass' => 'checkbox-inline',
            'value' => $this->indexedStatuses,
            'name' => 'status',
        ]);
    }
}
