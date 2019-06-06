<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\CollectionInterface;
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
}
