<?php

namespace Wstd\View\Presenters\Admin\Includes;

use Wstd\Domain\Models\Item\ItemCollectionInterface;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;

class TableForItems extends EntitiesTable
{
    use TableForBelongsToVendorTrait;

    public $id = 'items_table';
    public $title = '商品';

    public $itemLabels = [
        'thumb' => '商品写真',
        'vendor_id' => '事業者ID',
        'vendor' => '事業者',
    ];

    public function __construct(ItemCollectionInterface $items, array $args = [])
    {
        parent::__construct($items, $args);
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

    protected function getThumb($entity)
    {
        $photos = $entity->getPhotos();
        if ($photos->isEmpty()) {
            return '<span class="noImage thumbImage">No Image</span>';
        }
        return sprintf(
            '<a href="#" style="background-image:url(%s)" class="thumbImage"></a>',
            $photos->first()->getUrl('thumb')
        );
    }
}
