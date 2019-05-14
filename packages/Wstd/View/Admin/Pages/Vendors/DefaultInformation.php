<?php

namespace Wstd\View\Admin\Pages\Vendors;

use Wstd\Domain\Models\Vendor\VendorValueStatus;
use Wstd\View\Admin\Includes\AbstractDefaultInformation;

class DefaultInformation extends AbstractDefaultInformation
{
    public $items = [
        'id',
        'status',
    ];

    public $itemLabels = [
        'id'     => 'ID',
        'name'   => '事業者名',
        'status' => '状態',
    ];

    public $itemEditables = [
        'name',
        'status',
    ];

    public function header(): string
    {
        return '<i class="fa fa-user text-muted"></i> ' . e($this->entity->getName());
    }
}
