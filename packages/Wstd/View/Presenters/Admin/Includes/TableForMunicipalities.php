<?php

namespace Wstd\View\Presenters\Admin\Includes;

use Wstd\View\Presenters\Admin\Modules\EntitiesTable;

class TableForMunicipalities extends EntitiesTable
{
    public $id = 'municipalities_table';
    public $title = '地方公共団体';

    public $itemLabels = [
        'prefecture' => '都道府県',
        'code' => '団体コード',
        'name' => '自治体名',
        'country_or_city_name' => '市/郡',
        'town_or_ward_name' => '区/町村',
        'business_area' => '必要な営業許可証',
    ];

    protected function getPrefecture($entity)
    {
        $prefecture = $entity->getPrefecture();
        return sprintf('<a class="text-muted" href="?prefecture_id=%d">%s</a>', $prefecture->getId(), e($prefecture));
    }
}
