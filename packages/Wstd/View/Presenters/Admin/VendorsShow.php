<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Presenters\Presenter;
use Wstd\View\Presenters\Admin\Modules\EntityTable;
use Wstd\View\Presenters\Admin\Modules\TabContents;
use Wstd\View\Presenters\Admin\Templates\Properties;

class VendorsShow extends Presenter
{
    /**
     * @var Wstd\Domain\Models\EntityInterface
     */
    public $entity;

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
        $this->propertiesInstance = new Properties($this->entity, [
            'id' => $this->id . '_properties',
            'header' => '<i class="fa fa-user text-muted"></i> ' . e($this->entity->getName()),
            'properties' => [
                'id',
                'status',
            ],
            'propertyLabels' => [
                'id' => '登録番号',
            ],
            'editableProperties' => [
                'name',
                'status',
            ],
        ]);
    }

    protected function initBelongs()
    {
        $this->belongs = new TabContents([
            new CarsIndex($this->entity->getCars(), [
                'addable' => true,
                'items' => [
                    'thumb',
                    'name',
                    'vin',
                    'status',
                ],
                'isDataTable' => false,
                'title' => '<i class="fa fa-car"></i> 車両',
            ]),
            new ShopsIndex($this->entity->getShops(), [
                'addable' => true,
                'items' => [
                    'name',
                    'status',
                ],
                'isDataTable' => false,
                'title' => '<i class="fa fa-coffee"></i> 店舗',
            ]),
        ], [
            'id' => 'belongs_to_vendor',
        ]);
    }
}
