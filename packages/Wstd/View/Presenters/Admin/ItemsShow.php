<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\Item\ItemInterface;
use Wstd\View\Presenters\IdentifiedPresenter;
use Wstd\View\Presenters\Admin\Templates\Properties;

class ItemsShow extends IdentifiedPresenter
{
    protected $entity;

    public $id = 'item';
    public $title = '商品詳細';

    public $properties;

    public function __construct(ItemInterface $entity)
    {
        $this->entity = $entity;
        $this->initProperties();
    }

    protected function initProperties()
    {
        $id = $this->id . '_properties';
        $header = '<i class="fa fa-fw fa-cutlery "></i> ' . e($this->entity->getName());
        $properties = ['vendor', 'status',];
        $propertyLabels = ['vendor' => '事業者',];
        $propertyValues = ['vendor' => $this->vendorPropertyValue(),];
        $editableProperties = ['name', 'status',];

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
}
