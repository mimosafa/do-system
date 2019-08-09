<?php

namespace Wstd\View\Presenters\Admin;

use Illuminate\Support\HtmlString;
use Wstd\Domain\Models\CollectionInterface;
use Wstd\Infrastructure\Repositories\PrefectureRepository;
use Wstd\View\Presenters\Admin\Includes\TableForHealthCenters;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Templates\Index;

class HealthCentersIndex extends Index
{
    public $id = 'health_centers';
    public $title = '保健所一覧';

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
            'administration', 'name', 'business_area',
        ];
        $dataTableOptions = [
            'pageLength' => 100,
            'ordering' => false,
        ];

        if (!request('prefecture_id')) {
            array_unshift($items, 'prefecture');
        }

        return new TableForHealthCenters($collection, compact(
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
