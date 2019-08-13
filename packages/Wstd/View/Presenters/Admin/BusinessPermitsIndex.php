<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\CollectionInterface;
use Wstd\View\Presenters\Admin\Includes\TableForBusinessPermits;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Templates\Index;

class BusinessPermitsIndex extends Index
{
    public $id = 'business_permits';
    public $title = '営業許可一覧';

    protected function initTableInstance(CollectionInterface $collection): EntitiesTable
    {
        $isDataTable = true;
        $items = [
            'vendor',
            'approved',
            'permission',
            'business_area',
            'health_center',
            'end_date',
        ];
        $dataTableOptions = [
            'pageLength' => 100,
            'ordering' => false,
        ];

        return new TableForBusinessPermits($collection, compact(
            'isDataTable', 'items', 'dataTableOptions'
        ));
    }
}
