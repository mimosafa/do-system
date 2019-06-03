<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\CollectionInterface;
use Wstd\View\Presenters\Admin\Includes\CarsTable;
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
        'thumb', 'vendor_id', 'vendor',
        'name',  'vin',       'status',
    ];

    protected function initTableInstance(CollectionInterface $collection): EntitiesTable
    {
        $isDataTable = true;
        $items = $this->items;
        $dataTableOptions = [
            'pageLength' => 100,
            'order' => [
                [1, 'asc'],
            ],
        ];

        return new CarsTable($collection, compact(
            'isDataTable', 'items', 'dataTableOptions'
        ));
    }
}
