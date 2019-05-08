<?php

namespace Wstd\View\Models\Admin\Pages\Cars;

use Wstd\Domain\Models\Car\CarsCollection;
use Wstd\View\Models\Admin\AbstractIndexViewModel;
use Wstd\Infrastructure\Repositories\CarRepository;

class IndexViewModel extends AbstractIndexViewModel
{
    protected $items;

    public $nameOfIndexed  = 'cars';
    public $labelOfIndexed = '車両';

    public $isDataTable = true;

    public $itemsOfIndexed = [
        'id',
        'name',
        'vin',
    ];
    public $itemLabelsOfIndexed = [
        'id' => 'ID',
        'name' => '車両名',
        'vin' => '車両No',
    ];

    public function __construct(CarsCollection $collection)
    {
        $this->items = $collection;
    }

    public function list()
    {
        return $this->items;
    }

    public function idItemCallback($model)
    {
        return $model->getId();
    }

    public function nameItemCallback($model)
    {
        $name = $model->getName();
        $link = route('admin.cars.show', ['id' => $model->getId()]);
        $status = $model->getStatus();
        $append = $status->isRegistered() ? '' : ' <small>[ ' . $status->getLabel() . ' ]</small>';
        return '<a href="' . $link . '">' . $name . '</a>' . $append;
    }

    public function vinItemCallback($model)
    {
        return $model->getVin()->getValue();
    }

    protected function thClassesCallback(string $item): array
    {
        return [
            'th-' . $item,
        ];
    }

    protected function trClassesCallback($model): array
    {
        return [
            'tr-status-' . $model->getStatus()->getSlug(),
        ];
    }

    protected function tdClassesCallback(string $item, $model): array
    {
        return [
            'td-' . $item,
        ];
    }
}
