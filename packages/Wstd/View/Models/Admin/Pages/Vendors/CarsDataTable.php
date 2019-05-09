<?php

namespace Wstd\View\Models\Admin\Pages\Vendors;

use Wstd\Domain\Models\Car\CarsCollection;
use Wstd\Domain\Models\Vendor\Vendor;
use Wstd\View\Models\Admin\Components\AbstractDataTable;
use Wstd\View\Models\Admin\Includes\BelongsInterface;

class CarsDataTable extends AbstractDataTable implements BelongsInterface
{
    protected $vendor;

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

    /**
     * 車両追加モーダル表示のためカスタマイズ
     *
     * @todo 結構ハードコーディングなので必ずリファクタリングする
     */
    public $modalId = 'add-car-to-vendor';
    public $bladeTemplate = 'admin.pages.vendors.includes.carTable';

    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
        $this->collection = $vendor->getCars();
    }

    /**
     * 車両追加モーダル表示のためカスタマイズ
     *
     * @todo 結構ハードコーディングなので必ずリファクタリングする
     */
    public function emptyText(): string
    {
        $text = parent::emptyText();
        if ($this->vendor->isEditable()) {
            $text .= ' <a href="#" data-toggle="modal" data-target="#' . $this->modalId . '">最初の車両を登録しますか？</a>';
        }
        return $text;
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
