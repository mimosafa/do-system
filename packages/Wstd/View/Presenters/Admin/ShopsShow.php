<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\Shop\ShopInterface;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\IdentifiedPresenter;
use Wstd\View\Presenters\Admin\Modules\Content;
use Wstd\View\Presenters\Admin\Modules\Contents;
use Wstd\View\Presenters\Admin\Modules\FormContainer;
use Wstd\View\Presenters\Admin\Modules\Section;
use Wstd\View\Presenters\Admin\Modules\Sections;
use Wstd\View\Presenters\Admin\Templates\Properties;

class ShopsShow extends IdentifiedPresenter
{
    protected $entity;

    public $id = 'shop';

    public $title = '店舗詳細';

    public $properties;

    public $texts;

    public function __construct(ShopInterface $entity)
    {
        $this->entity = $entity;
        $this->initProperties();
        $this->initTexts();
    }

    protected function initProperties()
    {
        $id = $this->id . '_properties';
        $header = '<i class="fa fa-coffee text-muted"></i>' . e($this->entity->getName());
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

    protected function initTexts()
    {
        $subTitle = new Section($this->entity->getSubTitle(), [
            'header' => '短文紹介',
        ]);
        $description = new Section($this->entity->getDescription(), [
            'header' => '紹介文',
        ]);
        $longDescription = new Section($this->entity->getLongDescription(), [
            'header' => '長文紹介',
        ]);

        $texts = new Sections([
            $subTitle, $description, $longDescription,
        ]);

        $this->texts = new Contents(new Content($texts, [
            'id' => 'shop_texts',
            'title' => '紹介文',
            'form' => $this->initTextsForm(),
        ]));
    }

    protected function initTextsForm()
    {
        $forms = [
            FormFactory::makeInputText([
                'name' => 'sub_title',
                'label' => '短文紹介',
                'maxLength' => 30,
                'value' => $this->entity->getSubTitle(),
            ]),
            FormFactory::makeInputText([
                'name' => 'description',
                'label' => '紹介文',
                'maxLength' => 80,
                'value' => $this->entity->getDescription(),
            ]),
            FormFactory::makeTextarea([
                'name' => 'long_description',
                'label' => '長文紹介',
                'rows' => 8,
                'value' => $this->entity->getLongDescription(),
            ]),
        ];

        return new FormContainer($forms, [
            'id' => 'edit_texts',
            'title' => '紹介文を編集する',
        ]);
    }
}
