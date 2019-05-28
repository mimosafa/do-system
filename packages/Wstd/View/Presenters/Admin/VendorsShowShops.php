<?php

namespace Wstd\View\Presenters\Admin;

class VendorsShowShops extends ShopsIndex
{
    /**
     * @var string
     */
    public $title = '<i class="fa fa-coffee"></i> 店舗';

    public $items = [
        'vendor_id',
        'vendor',
        'name',
        'status',
    ];

    public $isDataTable = false;

    public $template = 'admin.modules.table';

    public function emptyMessage(): string
    {
        return '店舗の登録がありません';
    }
}
