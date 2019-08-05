<?php

namespace Wstd\View\Presenters\Admin\Includes;

use Wstd\View\Presenters\Admin\Modules\EntitiesTable;

class TableForHealthCenters extends EntitiesTable
{
    public $id = 'health_centers_table';
    public $title = '保健所';

    public $itemLabels = [
        'prefecture' => '都道府県',
        'administration' => '設置主体',
        'name' => '保健所名称',
        'business_area' => '許可地域',
    ];

    protected function getPrefecture($entity)
    {
        $prefecture = $entity->getPrefecture();
        return sprintf('<a class="text-muted" href="?prefecture_id=%d">%s</a>', $prefecture->getId(), e($prefecture));
    }
}
