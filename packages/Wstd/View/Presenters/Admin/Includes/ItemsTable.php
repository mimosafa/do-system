<?php

namespace Wstd\View\Presenters\Admin\Includes;

use Wstd\Domain\Models\Item\ItemCollectionInterface;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;

class ItemsTable extends EntitiesTable
{
    public $id = 'items_table';
    public $title = '商品';

    public function __construct(ItemCollectionInterface $items, array $args = [])
    {
        parent::__construct($items, $args);
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
        $link = route('admin.items.show', ['id' => $entity->getId(),]);
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
