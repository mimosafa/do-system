<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\IdentifiedPresenter;
use Wstd\View\Presenters\Admin\Includes\CarsTable;
use Wstd\View\Presenters\Admin\Includes\ItemsTable;
use Wstd\View\Presenters\Admin\Includes\ShopsTable;
use Wstd\View\Presenters\Admin\Modules\Content;
use Wstd\View\Presenters\Admin\Modules\Contents;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Modules\FormContainer;
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
            $this->initShopList(),
            $this->initItemList(),
        ];

        $this->belongs = new Contents($contents);
    }

    /**
     * @return Wstd\View\Presenters\Admin\CarsIndex
     */
    protected function initCarList()
    {
        $table = new CarsTable($this->entity->getCars(), [
            'items' => [
                'thumb',
                'name',
                'vin',
                'status',
            ],
        ]);

        return new Content($table, [
            'id' => 'vendor_cars',
            'title' => '<i class="fa fa-car"></i> 車両',
            'form' => $this->initCarForm(),
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
     * @return Wstd\View\Presenters\Admin\ShopsIndex
     */
    protected function initShopList()
    {
        $table = new ShopsTable($this->entity->getShops(), [
            'items' => [
                'thumb',
                'name',
                'status',
            ],
        ]);

        return new Content($table, [
            'id' => 'vendor_shops',
            'title' => '<i class="fa fa-coffee"></i> 店舗',
            'form' => $this->initShopForm(),
        ]);
    }

    protected function initShopForm()
    {
        $formItems = [
            FormFactory::makeInputText([
                'name' => 'name',
                'label' => '店舗名',
            ]),
            FormFactory::makeInputHidden([
                'name' => 'vendor_id',
                'value' => $this->entity->getId(),
            ]),
        ];

        return new FormContainer($formItems, [
            'id' => 'vendor_shops_form',
            'title' => '店舗を追加する',
            'action' => route('admin.shops.store'),
        ]);
    }

    protected function initItemList()
    {
        $table = new ItemsTable($this->entity->getItems(), [
            'items' => [
                'thumb', 'name', 'copy', 'status',
            ],
        ]);

        return new Content($table, [
            'id' => 'vendor_items',
            'title' => '<i class="fa fa-fw fa-cutlery "></i> 商品',
            'form' => $this->initItemForm(),
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
