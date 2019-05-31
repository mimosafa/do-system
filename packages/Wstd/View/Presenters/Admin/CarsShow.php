<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Presenters\Presenter;
use Wstd\View\Presenters\Admin\Modules\Gallery;
use Wstd\View\Presenters\Admin\Modules\TabContents;
use Wstd\View\Presenters\Admin\Templates\Properties;

class CarsShow extends Presenter
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
    public $propertiesInstance;

    /**
     * @var Wstd\View\Presenters\Admin\Modules\Gallery
     */
    public $galleryInstance;

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
        $title = $trigger = '基本情報を編集する';

        $this->propertiesInstance = new Properties($this->entity, compact(
            'id', 'header', 'properties', 'propertyLabels',
            'propertyValues', 'editableProperties', 'title', 'trigger'
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

        $id = 'car_photos';
        $fileKey = 'image'; // Added file key in request
        $action = route('admin.cars.photos.store', [
            'id' => $this->entity->getId()
        ]);

        $this->galleryInstance = new Gallery($images, compact('id', 'action', 'fileKey'));
    }
}
