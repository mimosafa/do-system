<?php

namespace Wstd\View\Presenters\Admin;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\EntityInterface;

class VendorShow extends ViewModel
{
    /**
     *
     */
    public $entity;

    public $id = 'vendor';

    public $title = '事業者詳細';

    public $propertiesInstance;

    /**
     *
     */
    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
        $this->propertiesInstance = new VendorShowProperties($entity);
    }
}
