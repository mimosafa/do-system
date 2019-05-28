<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Presenters\Presenter;
use Wstd\View\Presenters\Admin\Templates\Properties;

class VendorShow extends Presenter
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
     * @param Wstd\Domain\Models\EntityInterface
     */
    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
        $this->propertiesInstance = $this->initProperties();
    }

    protected function initProperties()
    {
        return new Properties($this->entity, [
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
}
