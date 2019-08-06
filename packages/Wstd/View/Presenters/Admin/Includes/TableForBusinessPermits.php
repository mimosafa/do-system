<?php

namespace Wstd\View\Presenters\Admin\Includes;

use Wstd\View\Presenters\Admin\Modules\EntitiesTable;

class TableForBusinessPermits extends EntitiesTable
{
    public $id = 'business_permits_table';
    public $title = '営業許可証';

    public $itemLabels = [
        'vendor' => '事業者',
        'approved' => '許可対象',
        'approved_type' => '施設区分',
        'business_area' => '許可地域',
        'health_center' => '申請先',
        'business_category' => '営業区分',
        'end_date' => '有効期限',
    ];

    protected function getPermission($entity)
    {
        $string = $entity->getBusinessCategory()->getLabel();

        if ($type = $entity->getApprovedType()->getLabel()) {
            $string .= " ({$type})";
        }

        $url = '#';

        return sprintf('<a href="%s">%s</a>', e($url), e($string));
    }

    protected function getApproved($entity)
    {
        $approved = $entity->getApproved();
        $approvedType = $entity->getApprovedType();

        $string = e($approved->getName());

        if ($approvedType->getValue() === 'car') {
            $id = $approved->getId();
            $url = route('admin.cars.show', compact('id'));

            $string = sprintf('<a class="text-muted" href="%s">%s</a>', e($url), $string);
        }

        return $string;
    }

    protected function getVendor($entity)
    {
        $vendor = $entity->getVendor();
        $id = $vendor->getId();
        $url = route('admin.vendors.show', compact('id'));

        return sprintf('<a class="text-muted" href="%s">%s</a>', e($url), e($vendor->getName()));
    }
}
