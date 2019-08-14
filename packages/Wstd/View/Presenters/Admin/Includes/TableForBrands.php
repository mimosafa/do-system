<?php

namespace Wstd\View\Presenters\Admin\Includes;

use Wstd\Domain\Models\Brand\BrandCollectionInterface;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;

class TableForBrands extends EntitiesTable
{
    use TableForBelongsToVendorTrait;

    public $id = 'brands_table';

    public $title = 'ブランド';

    public $itemLabels = [
        'thumb' => '商品写真',
        'vendor_id' => '事業者ID',
        'vendor' => '事業者',
        'name' => 'ブランド名',
        'items' => '提供商品',
    ];

    public function __construct(BrandCollectionInterface $brand, array $args = [])
    {
        parent::__construct($brand, $args);
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

    protected function getThumb($entity)
    {
        if ($photo = $entity->getPhoto()) {
            return sprintf(
                '<a href="#" style="background-image:url(%s)" class="thumbImage"></a>',
                $photo->getUrl('thumb')
            );
        }
        return '<span class="noImage thumbImage">No Image</span>';
    }

    protected function getName($entity)
    {
        $link = route('admin.brands.show', ['id' => $entity->getId(),]);
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

    protected function getItems($entity)
    {
        $return = [];
        $items = $entity->getItems();
        if ($items->isNotEmpty()) {
            foreach ($items as $item) {
                $return[] = sprintf(
                    '<a class="text-muted" href="%s">%s</a>',
                    route('admin.items.show', ['id' => e($item->getId()),]),
                    e($item->getName())
                );
            }
        }
        return implode('<span class="text-muted">, </span>', $return);
    }
}
