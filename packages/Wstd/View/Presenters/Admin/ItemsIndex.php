<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\CollectionInterface;
use Wstd\View\Presenters\Admin\Includes\TableForItems;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Templates\Index;

class ItemsIndex extends index
{
    public $id = 'items';
    public $title = '商品一覧';

    public $items = [
        'vendor_id',
        'thumb',
        'vendor',
        'name',
        'status',
    ];

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
}
