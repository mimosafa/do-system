<?php

namespace Wstd\View\Admin\Pages\Cars;

use Wstd\Domain\Models\Car\CarValueStatus;
use Wstd\View\Admin\ViewModelInterface;
use Wstd\View\Admin\Includes\AbstractDefaultInformation;
use Wstd\View\Admin\Modules\FormItems\Select;

class DefaultInformation extends AbstractDefaultInformation implements ViewModelInterface
{
    public $items = [
        'vendor',
        'id',
        'vin',
        'status',
    ];

    public $itemLabels = [
        'vendor' => '事業者',
        'id'     => 'ID',
        'name'   => '車両名',
        'vin'    => '車両No',
        'status' => '状態',
    ];

    public $itemEditables = [
        'name',
        'vin',
        'status',
    ];

    public function header(): string
    {
        return '<i class="fa fa-car text-muted"></i> ' . e($this->entity->getName());
    }

    public function vendorContent()
    {
        $vendor = $this->entity->getVendor();
        $name = $vendor->getName();
        $link = route('admin.vendors.show', ['id' => $vendor->getId()]);
        return sprintf('<a href="%s">%s<?a>', $link, '<i class="fa fa-user"></i> ' . e($name));
    }
}
