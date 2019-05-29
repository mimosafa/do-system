<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Admin\Templates\Index;
use Wstd\View\Presenters\Admin\Traits\VendorsShowBelongs;

class CarsIndex extends Index
{
    use VendorsShowBelongs;

    /**
     * @var string
     */
    public $id = 'cars';

    public $collectionName = '車両';

    /**
     * @var string
     */
    public $title = '車両一覧';

    public $dataTableOptions = [
        'order' => [[1, 'asc']],
    ];

    /**
     * @var array
     */
    public $items = [
        'thumb',
        'vendor_id',
        'vendor',
        'name',
        'vin',
        'status',
    ];

    /**
     * @var array
     */
    protected $itemLabels = [
        'vendor_id' => '事業者ID',
        'thumb' => '車両写真',
    ];

    /**
     * @see Wstd\View\Presenters\Admin\Traits\VendorsShowBelongs
     */
    public function addFormId(): string
    {
        return 'add_car';
    }

    /**
     * @see Wstd\View\Presenters\Admin\Traits\VendorsShowBelongs
     */
    public function formElements()
    {
        $formItems = [
            FormFactory::makeInputText([
                'id' => 'add_car_name',
                'name' => 'car.name',
                'label' => '車両名',
            ]),
            FormFactory::makeInputText([
                'id' => 'add_car_vin',
                'name' => 'car.vin',
                'label' => '車両No',
            ]),
        ];
        
        return $formItems;
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

    public function emptyMessage(): string
    {
        return '車両の登録がありません';
    }
}
