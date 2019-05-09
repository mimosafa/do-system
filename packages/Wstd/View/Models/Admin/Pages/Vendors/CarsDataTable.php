<?php

namespace Wstd\View\Models\Admin\Pages\Vendors;

use Wstd\Domain\Models\Car\CarsCollection;
use Wstd\View\Models\Admin\Components\AbstractDataTable;
use Wstd\View\Models\Admin\Includes\BelongsInterface;

class CarsDataTable extends AbstractDataTable implements BelongsInterface
{
    public $name = 'cars';

    public $label = '車両';

    public $isDataTable = false;

    public $items = [
        'name',
        'vin',
        'status',
    ];

    public $itemLabels = [
        'name' => '車両名',
        'vin' => '車両No',
        'status' => '状態',
    ];

    public function __construct(CarsCollection $cars)
    {
        $this->collection = $cars;
    }

    public function nameOfBelongs(): string
    {
        return $this->name;
    }

    public function labelOfBelongs(): string
    {
        return '<i class="fa fa-car"></i> 車両';
    }

    public function tdName($value)
    {
        return sprintf('<a href="%s">%s</a>',
            e(route('admin.cars.show', ['id' => $value->getId()])),
            e($value->getName())
        );
    }

    public function tdStatus($value)
    {
        return e($value->getStatus()->getLabel());
    }

    public function tdVin($value)
    {
        return e($value->getVin()->getValue());
    }
}
