<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\Brand\BrandInterface;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\IdentifiedPresenter;
use Wstd\View\Presenters\Admin\Includes\TableForCars;
use Wstd\View\Presenters\Admin\Includes\TableForItems;
use Wstd\View\Presenters\Admin\Modules\Content;
use Wstd\View\Presenters\Admin\Modules\Contents;
use Wstd\View\Presenters\Admin\Modules\FormContainer;
use Wstd\View\Presenters\Admin\Modules\Section;
use Wstd\View\Presenters\Admin\Modules\Sections;
use Wstd\View\Presenters\Admin\Templates\Belongs;
use Wstd\View\Presenters\Admin\Templates\Properties;

class BrandsShow extends IdentifiedPresenter
{
    protected $entity;

    public $id = 'brand';

    public $title = 'ブランド詳細';

    /**
     * @var Wstd\Domain\Models\Item\ItemCollection
     */
    private $items;

    private $availableCarsCollection;
    public $availableCars;

    /**
     * @var Wstd\View\Presenters\Admin\Templates\Properties
     */
    public $properties;

    /**
     * @var Wstd\View\Presenters\Admin\Modules\Contents
     */
    public $contents;

    public function __construct(BrandInterface $entity)
    {
        $this->entity = $entity;
        $this->items = $entity->getItems();
        $this->availableCarsCollection = $entity->getAvailableCars();
        $this->initProperties();
        $this->initContents();
        $this->initAvailableCars();
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

    protected function initContents()
    {
        $contents = [
            $this->initItems(),
            $this->initTexts(),
        ];

        $this->contents = new Contents($contents);
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

        return new Content($texts, [
            'id' => 'brand_texts',
            'title' => '<i class="fa fa-comments"></i> 紹介文',
            'form' => $this->initTextsForm(),
        ]);
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

    protected function initItems()
    {
        $table = new TableForItems($this->items, [
            'items' => [
                'thumb', 'name', 'copy', 'status',
            ],
            'attributes' => [
                'table' => [
                    'class' => 'sortable-table',
                ],
            ],
        ]);

        $beforeSort = [];
        foreach ($this->items as $item) {
            $beforeSort[] = $item->getId();
        }

        return new Belongs($table, [
            'id' => 'brand_items',
            'title' => '<i class="fa fa-fw fa-cutlery "></i> 商品',
            'exchangable' => true,
            'exchangeForm' => $this->initItemsForm(),
            'exchangeText' => '商品を追加・削除する',
            'sortable' => true,
            'beforeSort' => $beforeSort,
            'nameForSort' => 'items',
            'sortText' => '並び替えを保存する',
        ]);
    }

    protected function initItemsForm()
    {
        $vendorItems = $this->entity->getVendor()->getItems();

        $options = [];
        foreach ($vendorItems as $vendorItem) {
            $options[$vendorItem->getId()] = $vendorItem->getName();
        }

        $values = [];
        foreach ($this->items as $item) {
            $values[] = $item->getId();
        }

        $form = FormFactory::makeSelect($options, [
            'name' => 'items',
            'multiple' => true,
            'label' => '商品選択',
            'value' => $values,
            'select2' => true,
        ]);

        return new FormContainer($form, [
            'id' => 'add_item_form',
            'title' => '商品を追加する',
        ]);
    }

    protected function initAvailableCars()
    {
        $table = new TableForCars($this->availableCarsCollection, [
            'items' => [
                'thumb', 'name',
            ],
        ]);

        $this->availableCars = new Contents(
            new Belongs($table, [
                'id' => 'brand_available_cars',
                'title' => '<i class="fa fa-fw fa-car "></i> 提供可能な車両',
                'exchangable' => true,
                'exchangeForm' => $this->initAvailableCarsForm(),
                'exchangeText' => '提供可能な車両を変更する',
            ]), [
                'boxContext' => 'primary',
            ]
        );
    }

    protected function initAvailableCarsForm()
    {
        $vendorCars = $this->entity->getVendor()->getCars();

        $options = [];
        foreach ($vendorCars as $vendorCar) {
            $options[$vendorCar->getId()] = $vendorCar->getName();
        }

        $values = [];
        foreach ($this->availableCarsCollection as $car) {
            $values[] = $car->getId();
        }

        $forms = [
            FormFactory::makeSelect($options, [
                'name' => 'available_cars',
                'multiple' => true,
                'label' => '提供可能な車両',
                'value' => $values,
                'select2' => true,
            ]),
        ];

        if (! empty($values)) {
            $forms[] = FormFactory::makeInputHidden([
                'name' => 'detach_available_cars',
                'value' => 1,
            ]);
        }

        $id = 'edit_available_cars';
        $title = $toggle = '提供可能な車両';

        return new FormContainer($forms, compact('id', 'title', 'toggle'));
    }
}
