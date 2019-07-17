<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\CollectionInterface;
use Wstd\View\Presenters\Admin\Includes\TableForCities;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Templates\Index;

class CitiesIndex extends Index
{
    public $id = 'cities';
    public $title = '市区郡町村一覧';

    protected function initTableInstance(CollectionInterface $collection): EntitiesTable
    {
        $isDataTable = true;
        $items = [
            'prefecture', 'name',
        ];
        $dataTableOptions = [
            'pageLength' => 100,
            'ordering' => false,
        ];

        return new TableForCities($collection, compact(
            'isDataTable', 'items', 'dataTableOptions'
        ));
    }
}
