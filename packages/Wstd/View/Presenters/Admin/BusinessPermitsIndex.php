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
            'business_area',
            'health_center',
            'business_category',
            'end_date',
        ];
        $dataTableOptions = [
            'pageLength' => 100,
        ];

        return new TableForBusinessPermits($collection, compact(
            'isDataTable', 'items', 'dataTableOptions'
        ));
    }
}
