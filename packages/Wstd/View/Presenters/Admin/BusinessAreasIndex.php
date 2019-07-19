<?php

namespace Wstd\View\Presenters\Admin;

use Illuminate\Support\HtmlString;
use Wstd\Domain\Models\CollectionInterface;
use Wstd\Infrastructure\Repositories\PrefectureRepository;
use Wstd\View\Presenters\Admin\Includes\TableForBusinessAreas;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Templates\Index;

class BusinessAreasIndex extends Index
{
    public $id = 'business_areas';
    public $title = '営業区域一覧';

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
            'prefecture', 'name',
        ];
        $dataTableOptions = [
            'pageLength' => 100,
            'ordering' => false,
        ];

        return new TableForBusinessAreas($collection, compact(
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
