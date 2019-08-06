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
        'business_area' => '許可地域',
        'health_center' => '申請先',
        'business_category' => '営業区分',
        'end_date' => '有効期限',
    ];

    protected function getApproved($entity)
    {
        return e($entity->getApproved()->getName());
    }

    protected function getVendor($entity)
    {
        return e($entity->getVendor()->getName());
    }
}
