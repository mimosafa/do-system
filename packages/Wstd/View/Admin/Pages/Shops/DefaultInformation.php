<?php

namespace Wstd\View\Admin\Pages\Shops;

use Wstd\Domain\Models\Shop\ShopValueStatus;
use Wstd\View\Admin\ViewModelInterface;
use Wstd\View\Admin\Includes\AbstractDefaultInformation;
use Wstd\View\Admin\Modules\FormItems\Select;

final class DefaultInformation extends AbstractDefaultInformation implements ViewModelInterface
{
    public $items = [
        'vendor',
        'status',
    ];

    public $itemLabels = [
        'vendor' => '事業者',
        'name'   => '店舗名',
        'status' => '状態',
    ];

    public $itemEditables = [
        'name',
        'status',
    ];

    public function header(): string
    {
        return '<i class="fa fa-coffee text-muted"></i> ' . e($this->entity->getName());
    }

    public function vendorContent()
    {
        $vendor = $this->entity->getVendor();
        $name = $vendor->getName();
        $link = route('admin.vendors.show', ['id' => $vendor->getId()]);
        return sprintf('<a href="%s">%s<?a>', $link, '<i class="fa fa-user"></i> ' . e($name));
    }
}
