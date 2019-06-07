<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Presenters\IdentifiedPresenter;
use Wstd\View\Presenters\Admin\Modules\Contents;
use Wstd\View\Presenters\Admin\Modules\Gallery;
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
     * @var Wstd\View\Presenters\Admin\Modules\Gallery
     */
    public $gallery;

    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
        $this->initProperties();
        $this->initGallery();
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

    protected function initGallery()
    {
        $images = $this->entity->getPhotos();
        $id = 'car_images';
        $title = '車両画像';
        $addable = true;
        $sortable = true;
        /**
         * @see Wstd\Application\Requests\CarRequest
         */
        $nameForAdd = 'car_photo';
        $nameForSort = 'car_photos';

        $gallery = new Gallery($images, compact(
            'id', 'title', 'addable', 'sortable', 'nameForAdd', 'nameForSort'
        ));

        $this->gallery = new Contents($gallery);
    }
}
