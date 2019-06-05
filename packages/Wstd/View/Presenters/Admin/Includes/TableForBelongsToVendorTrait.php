<?php

namespace Wstd\View\Presenters\Admin\Includes;

trait TableForBelongsToVendorTrait
{
    # protected $entity;

    protected function getVendorId($entity)
    {
        return e($entity->getVendor()->getId());
    }

    protected function getVendor($entity)
    {
        $vendor = $entity->getVendor();
        $link = route('admin.vendors.show', ['id' => $vendor->getId(),]);
        $status = $vendor->getStatus();
        $string = sprintf('<a class="text-muted" href="%s">%s</a>', e($link), e($vendor->getName()));
        if (! $status->isRegistered()) {
            $string = sprintf('<small class="text-muted">[ %s ]</small> ', e(strval($status))) . $string;
        }
        return $string;
    }
}
