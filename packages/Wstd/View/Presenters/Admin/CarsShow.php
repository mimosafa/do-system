<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Presenters\IdentifiedPresenter;
use Wstd\View\Presenters\Admin\Includes\TableForBusinessPermits;
use Wstd\View\Presenters\Admin\Modules\Contents;
use Wstd\View\Presenters\Admin\Modules\Gallery;
use Wstd\View\Presenters\Admin\Templates\Belongs;
use Wstd\View\Presenters\Admin\Templates\Properties;

class CarsShow extends IdentifiedPresenter
{
    /**
     * @var Wstd\Domain\Models\EntityInterface
     */
    protected $entity;

    /**
     * @var string
     */
    public $id = 'car';

    /**
     * @var string
     */
    public $title = '車両詳細';

    /**
     * @var Wstd\View\Presenters\Admin\Templates\Properties
     */
    public $properties;

    /**
     * @var Wstd\View\Presenters\Admin\Modules\Contents
     */
    public $contents;

    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
        $this->initProperties();
        $this->initContents();
    }

    protected function initProperties()
    {
        $id = $this->id . '_properties';
        $header = '<i class="fa fa-car text-muted"></i> ' . e($this->entity->getName());
        $properties = ['vendor', 'vin', 'status',];
        $propertyLabels = ['vendor' => '事業者',];
        $propertyValues = ['vendor' => $this->vendorPropertyValue(),];
        $editableProperties = ['name', 'vin', 'status',];

        $this->properties = new Properties($this->entity, compact(
            'id', 'header', 'properties', 'propertyLabels',
            'propertyValues', 'editableProperties'
        ));
    }

    protected function vendorPropertyValue()
    {
        $vendor = $this->entity->getVendor();
        $name = $vendor->getName();
        $link = route('admin.vendors.show', ['id' => $vendor->getId()]);

        return sprintf('<a href="%s">%s</a>', $link, '<i class="fa fa-user"></i> ' . e($name));
    }

    protected function initContents()
    {
        $contents = [
            $this->initGallery(),
            $this->initBusinessPermits(),
        ];

        $this->contents = new Contents($contents);
    }

    protected function initGallery()
    {
        $images = $this->entity->getPhotos();
        $id = 'car_images';
        $title = '<i class="fa fa-camera"></i> 車両画像';
        $addable = true;
        $sortable = true;
        $removal = true;
        /**
         * @see Wstd\Application\Requests\CarRequest
         */
        $nameForAdd = 'car_photo';
        $nameForSort = 'car_photos';
        $nameForRemove = 'remove_car_photos';

        return new Gallery($images, compact(
            'id', 'title', 'addable', 'sortable', 'removal',
            'nameForAdd', 'nameForSort', 'nameForRemove'
        ));
    }

    protected function initBusinessPermits()
    {
        $items = [
            'permission',
            'business_area',
            'health_center',
            'end_date',
        ];

        $table = new TableForBusinessPermits(
            $this->entity->getBusinessPermits(),
            compact('items')
        );

        return new Belongs($table, [
            'id' => 'car_business_permits',
            'title' => '<i class="fa fa-file-text"></i> 営業許可',
        ]);
    }
}
