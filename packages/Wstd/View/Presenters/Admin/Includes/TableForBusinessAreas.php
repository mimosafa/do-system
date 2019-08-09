<?php

namespace Wstd\View\Presenters\Admin\Includes;

use Wstd\View\Presenters\Admin\Modules\EntitiesTable;

class TableForBusinessAreas extends EntitiesTable
{
    public $id = 'business_areas_table';
    public $title = '営業区域';

    public $itemLabels = [
        'prefecture' => '都道府県',
        'name' => '営業区域',
    ];

    protected function getPrefecture($entity)
    {
        $prefecture = $entity->getPrefecture();
        return sprintf('<a class="text-muted" href="?prefecture_id=%d">%s</a>', $prefecture->getId(), e($prefecture));
    }
}
