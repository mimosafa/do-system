<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Presenters\Admin\Templates\Index;

class ShopsIndex extends Index
{
    /**
     * @var string
     */
    public $id = 'shops';

    /**
     * @var string
     */
    public $title = '店舗一覧';

    /**
     * @var array
     */
    public $items = [
        'vendor_id',
        'vendor',
        'name',
        'status',
    ];

    /**
     * @var array
     */
    protected $itemLabels = [
        'vendor_id' => '事業者ID',
    ];

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
