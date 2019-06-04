<?php

namespace Wstd\View\Presenters\Admin\Includes;

use Wstd\Domain\Models\Shop\ShopCollectionInterface;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;

class ShopsTable extends EntitiesTable
{
    public $id = 'shops_table';

    public $title = '店舗';

    public $itemLabels = [
        'vendor_id' => '事業者ID',
        'vendor' => '事業者',
        'name' => '店舗名',
    ];

    public function __construct(ShopCollectionInterface $shop, array $args = [])
    {
        parent::__construct($shop, $args);
    }

    protected function trClasses($entity): array
    {
        $classes = [];
        $status = $entity->getStatus();
        if (! $status->isRegistered()) {
            $classes[] = 'status_' . $status->getSlug();
        }
        return $classes;
    }

    protected function getVendorId($entity)
    {
        return e($entity->getVendor()->getId());
    }

    protected function getVendor($entity)
    {
        $vendor = $entity->getVendor();
        $link = route('admin.vendors.show', ['id' => $vendor->getId(),]);
        $status = $vendor->getStatus();
        $string = sprintf('<a href="%s">%s</a>', e($link), e($vendor->getName()));
        if (! $status->isRegistered()) {
            $string = sprintf('<small class="muted">[ %s ]</small> ', e(strval($status))) . $string;
        }
        return $string;
    }

    protected function getName($entity)
    {
        $link = route('admin.shops.show', ['id' => $entity->getId(),]);
        $status = $entity->getStatus();
        $string = sprintf('<a href="%s">%s</a>', e($link), e($entity->getName()));
        if (! $status->isRegistered()) {
            $string = sprintf('<small class="muted">[ %s ]</small> ', e(strval($status))) . $string;
        }
        return $string;
    }

    protected function getStatus($entity)
    {
        $status = $entity->getStatus();
        return $status->isRegistered() ? '' : e(strval($status));
    }
}
