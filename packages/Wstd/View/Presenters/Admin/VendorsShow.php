<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Presenters\Presenter;
use Wstd\View\Presenters\Admin\Modules\TabContents;
use Wstd\View\Presenters\Admin\Templates\Properties;

class VendorsShow extends Presenter
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
    public $propertiesInstance;

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
        $title = $trigger = '基本情報を編集する';

        $this->propertiesInstance = new Properties($this->entity, compact(
            'id', 'header', 'properties', 'propertyLabels', 'editableProperties', 'title', 'trigger'
        ));
    }

    protected function initBelongs()
    {
        $contents = [
            $this->initCarList(),
            $this->initShopList(),
        ];

        $this->belongs = new TabContents($contents, [
            'id' => 'belongs_to_vendor',
        ]);
    }

    /**
     * @return Wstd\View\Presenters\Admin\CarsIndex
     */
    protected function initCarList(): CarsIndex
    {
        $cars = $this->entity->getCars();

        $addable = true;
        $items = ['thumb', 'name', 'vin', 'status',];
        $isDataTable = false;
        $title = '<i class="fa fa-car"></i> 車両';
        $vendor_id = $this->entity->getId();

        return new CarsIndex($cars, compact(
            'addable', 'items', 'isDataTable', 'title', 'vendor_id'
        ));
    }

    /**
     * @return Wstd\View\Presenters\Admin\ShopsIndex
     */
    protected function initShopList(): ShopsIndex
    {
        $shops = $this->entity->getShops();

        $addable = true;
        $items = ['name', 'status',];
        $isDataTable = false;
        $title = '<i class="fa fa-coffee"></i> 店舗';
        $vendor_id = $this->entity->getId();

        return new ShopsIndex($shops, compact(
            'addable', 'items', 'isDataTable', 'title', 'vendor_id'
        ));
    }
}
