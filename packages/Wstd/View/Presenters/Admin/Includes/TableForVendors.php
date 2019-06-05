<?php

namespace Wstd\View\Presenters\Admin\Includes;

use Wstd\Domain\Models\Vendor\VendorCollectionInterface;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;

class TableForVendors extends EntitiesTable
{
    public $id = 'vendors_table';

    public $title = '事業者';

    public $itemLabels = [
        'id' => 'ID',
        'name' => '事業者名',
        'status' => '登録状況',
    ];

    public function __construct(VendorCollectionInterface $vendors, array $args = [])
    {
        parent::__construct($vendors, $args);
    }

    public function trClasses($entity): array
    {
        $classes = [];
        $status = $entity->getStatus();
        if (! $status->isRegistered()) {
            $classes[] = 'status_' . e($status->getSlug());
        }
        return $classes;
    }

    protected function getName($entity)
    {
        $link = route('admin.vendors.show', ['id' => $entity->getId(),]);
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
