<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\CollectionInterface;
use Wstd\View\Presenters\Admin\Includes\TableForShops;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Templates\Index;

class ShopsIndex extends Index
{
    /**
     * @var string
     */
    public $id = 'shops';

    /**
     * @var string
     */
    public $title = '店舗一覧';

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

        return new TableForShops($collection, compact(
            'isDataTable', 'items', 'dataTableOptions', 'hiddenColumns'
        ));
    }
}
