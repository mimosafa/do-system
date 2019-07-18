<?php

namespace Wstd\View\Presenters\Admin;

use Illuminate\Support\HtmlString;
use Wstd\Domain\Models\CollectionInterface;
use Wstd\Infrastructure\Repositories\PrefectureRepository;
use Wstd\View\Presenters\Admin\Includes\TableForCities;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Templates\Index;

class CitiesIndex extends Index
{
    public $id = 'cities';
    public $title = '地方自治体一覧';

    private $prefectureRepository;

    public $prefectures;

    public function __construct(CollectionInterface $collection, array $args = [])
    {
        parent::__construct($collection, $args);
        $this->prefectureRepository = new PrefectureRepository();
        $this->prefectures = $this->prefectureRepository->find();
    }

    protected function initTableInstance(CollectionInterface $collection): EntitiesTable
    {
        $isDataTable = true;
        $items = [
            'prefecture', 'country_or_city_name', 'town_or_ward_name',
        ];
        $dataTableOptions = [
            'pageLength' => 100,
            'ordering' => false,
        ];

        return new TableForCities($collection, compact(
            'isDataTable', 'items', 'dataTableOptions'
        ));
    }

    public function titleAddon()
    {
        $addOn = parent::titleAddon();
        $html = $addOn ? $addOn->toHtml() : '';

        if ($prefecture_id = request('prefecture_id')) {
            $prefecture = $this->prefectureRepository->findById($prefecture_id);
            $html = sprintf(' <small>( %s )</small>', e($prefecture)) . $html;
        }

        return new HtmlString($html);
    }
}
