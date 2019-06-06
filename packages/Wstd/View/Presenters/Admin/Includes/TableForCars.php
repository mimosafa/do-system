<?php

namespace Wstd\View\Presenters\Admin\Includes;

use Wstd\Domain\Models\Car\CarCollectionInterface;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;

class TableForCars extends EntitiesTable
{
    use TableForBelongsToVendorTrait;

    public $id = 'cars_table';

    public $title = '車両';

    public $itemLabels = [
        'thumb' => '車両写真',
        'vendor_id' => '事業者ID',
        'vendor' => '事業者',
        'name' => '車両名',
    ];

    public function __construct(CarCollectionInterface $cars, array $args = [])
    {
        parent::__construct($cars, $args);
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
        $photos = $entity->getPhotos();
        if ($photos->isEmpty()) {
            return '<span class="noImage thumbImage">No Image</span>';
        }
        return sprintf(
            '<a href="#" style="background-image:url(%s)" class="thumbImage"></a>',
            $photos->first()->getUrl('thumb')
        );
    }

    protected function getName($entity)
    {
        $link = route('admin.cars.show', ['id' => $entity->getId(),]);
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
