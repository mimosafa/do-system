<?php

namespace Wstd\View\Presenters\Admin\Includes;

use Wstd\View\Presenters\Admin\Modules\EntitiesTable;

class TableForCities extends EntitiesTable
{
    public $id = 'cities_table';
    public $title = '地方自治体';

    public $itemLabels = [
        'prefecture' => '都道府県',
        'name' => '自治体名',
        'country_or_city_name' => '市/郡',
        'town_or_ward_name' => '区/町村',
    ];

    protected function getPrefecture($entity)
    {
        $prefecture = $entity->getPrefecture();
        return sprintf('<a class="text-muted" href="?prefecture_id=%d">%s</a>', $prefecture->getId(), e($prefecture));
    }
}
