<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\CollectionInterface;
use Wstd\View\Presenters\Admin\Includes\ItemsTable;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Templates\Index;

class ItemsIndex extends index
{
    public $id = 'items';
    public $title = '商品一覧';

    public $items = [
        'thumb', 'vendor_id', 'vendor', 'name', 'status',
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

        return new ItemsTable($collection, compact(
            'isDataTable', 'items', 'dataTableOptions'
        ));
    }
}
