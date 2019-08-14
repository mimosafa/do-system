<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\IdentifiedPresenter;
use Wstd\View\Presenters\Admin\Includes\TableForCars;
use Wstd\View\Presenters\Admin\Includes\TableForItems;
use Wstd\View\Presenters\Admin\Includes\TableForBrands;
use Wstd\View\Presenters\Admin\Modules\Content;
use Wstd\View\Presenters\Admin\Modules\Contents;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Modules\FormContainer;
use Wstd\View\Presenters\Admin\Templates\Belongs;
use Wstd\View\Presenters\Admin\Templates\Properties;

class VendorsShow extends IdentifiedPresenter
{
    /**
     * @var Wstd\Domain\Models\EntityInterface
     */
    protected $entity;

    /**
     * @var string
     */
    public $id = 'vendor';

    /**
     * @var string
     */
    public $title = '事業者詳細';

    /**
     * @var Wstd\View\Presenters\Admin\Templates\Properties
     */
    public $properties;

    /**
     * @var Wstd\View\Presenters\Admin\Modules\TabContents
     */
    public $belongs;

    /**
     * @param Wstd\Domain\Models\EntityInterface
     */
    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
        $this->initProperties();
        $this->initBelongs();
    }

    protected function initProperties()
    {
        $id = $this->id . '_properties';
        $header = '<i class="fa fa-user text-muted"></i> ' . e($this->entity->getName());
        $properties = ['id', 'status',];
        $propertyLabels = ['id' => '登録番号',];
        $editableProperties = ['name','status',];

        $this->properties = new Properties($this->entity, compact(
            'id', 'header', 'properties', 'propertyLabels', 'editableProperties', 'title', 'trigger'
        ));
    }

    protected function initBelongs()
    {
        $contents = [
            $this->initCarList(),
            $this->initBrandList(),
            $this->initItemList(),
        ];

        $this->belongs = new Contents($contents);
    }

    /**
     * @return Wstd\View\Presenters\Admin\CarsIndex
     */
    protected function initCarList()
    {
        $table = new TableForCars($this->entity->getCars(), [
            'items' => [
                'thumb',
                'name',
                'vin',
                'status',
            ],
            'attributes' => [
                'table' => [
                    'class' => 'sortable-table',
                ],
            ],
        ]);

        $beforeSort = [];
        foreach ($this->entity->getCars() as $car) {
            $beforeSort[] = $car->getId();
        }

        return new Belongs($table, [
            'id' => 'vendor_cars',
            'title' => '<i class="fa fa-car"></i> 車両',
            'exchangable' => true,
            'exchangeForm' => $this->initCarForm(),
            'exchangeText' => '車両を追加する',
            'sortable' => true,
            'beforeSort' => $beforeSort,
            'nameForSort' => 'cars',
            'sortText' => '車両の並び順を保存する',
        ]);
    }

    protected function initCarForm()
    {
        $formItems = [
            FormFactory::makeInputText([
                'name' => 'name',
                'label' => '車両名',
            ]),
            FormFactory::makeInputText([
                'name' => 'vin',
                'label' => '車両No',
            ]),
            FormFactory::makeInputHidden([
                'name' => 'vendor_id',
                'value' => $this->entity->getId(),
            ]),
        ];

        return new FormContainer($formItems, [
            'id' => 'vendor_cars_form',
            'title' => '車両を追加する',
            'action' => route('admin.cars.store'),
        ]);
    }

    /**
     * @return Wstd\View\Presenters\Admin\BrandsIndex
     */
    protected function initBrandList()
    {
        $table = new TableForBrands($this->entity->getBrands(), [
            'items' => [
                'thumb',
                'name',
                'items',
                'status',
            ],
            'attributes' => [
                'table' => [
                    'class' => 'sortable-table',
                ],
            ],
        ]);

        $beforeSort = [];
        foreach ($this->entity->getBrands() as $brand) {
            $beforeSort[] = $brand->getId();
        }

        return new Belongs($table, [
            'id' => 'vendor_brands',
            'title' => '<i class="fa fa-coffee"></i> ブランド',
            'exchangable' => true,
            'exchangeForm' => $this->initBrandForm(),
            'exchangeText' => 'ブランドを追加する',
            'sortable' => true,
            'beforeSort' => $beforeSort,
            'nameForSort' => 'brands',
            'sortText' => 'ブランドの並び順を保存する',
        ]);
    }

    protected function initBrandForm()
    {
        $formItems = [
            FormFactory::makeInputText([
                'name' => 'name',
                'label' => 'ブランド名',
            ]),
            FormFactory::makeInputHidden([
                'name' => 'vendor_id',
                'value' => $this->entity->getId(),
            ]),
        ];

        return new FormContainer($formItems, [
            'id' => 'vendor_brands_form',
            'title' => 'ブランドを追加する',
            'action' => route('admin.brands.store'),
        ]);
    }

    protected function initItemList()
    {
        $table = new TableForItems($this->entity->getItems(), [
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
        foreach ($this->entity->getItems() as $item) {
            $beforeSort[] = $item->getId();
        }

        return new Belongs($table, [
            'id' => 'vendor_items',
            'title' => '<i class="fa fa-cutlery"></i> 商品',
            'exchangable' => true,
            'exchangeForm' => $this->initItemForm(),
            'exchangeText' => '商品を追加する',
            'sortable' => true,
            'beforeSort' => $beforeSort,
            'nameForSort' => 'items',
            'sortText' => '商品の並び順を保存する',
        ]);
    }

    protected function initItemForm()
    {
        $forms = [
            FormFactory::makeInputText([
                'name' => 'name',
                'label' => '商品名',
            ]),
            FormFactory::makeInputHidden([
                'name' => 'vendor_id',
                'value' => $this->entity->getId(),
            ]),
        ];

        return new FormContainer($forms, [
            'id' => 'vendor_items_form',
            'title' => '商品を追加する',
            'action' => route('admin.items.store'),
        ]);
    }
}
