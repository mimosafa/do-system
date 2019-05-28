<?php

namespace Wstd\View\Presenters\Admin;

class VendorsShowCars extends CarsIndex
{
    /**
     * @var string
     */
    public $title = '<i class="fa fa-car"></i> 車両';

    public $items = [
        'thumb',
        'name',
        'vin',
        'status',
    ];

    public $isDataTable = false;

    public $template = 'admin.modules.table';

    public function emptyMessage(): string
    {
        return '車両の登録がありません';
    }
}
