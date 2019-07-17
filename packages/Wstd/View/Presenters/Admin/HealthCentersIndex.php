<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\CollectionInterface;
use Wstd\View\Presenters\Admin\Includes\TableForHealthCenters;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Templates\Index;

class HealthCentersIndex extends Index
{
    public $id = 'health_centers';
    public $title = '保健所一覧';

    protected function initTableInstance(CollectionInterface $collection): EntitiesTable
    {
        $isDataTable = true;
        $items = [
            'prefecture', 'city', 'name',
        ];
        $dataTableOptions = [
            'pageLength' => 100,
            'ordering' => false,
        ];

        return new TableForHealthCenters($collection, compact(
            'isDataTable', 'items', 'dataTableOptions'
        ));
    }
}
