<?php

namespace Wstd\View\Models\Admin\Pages\Vendors;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Equipment\View\Models\Traits\UtilityTrait;

class ShowViewModel extends ViewModel
{
    use UtilityTrait;

    /**
     * @var Wstd\Domain\Models\EntityInterface
     */
    public $entity;

    /**
     * @var Wstd\View\Models\Admin\Vendors\DefaultInformation
     */
    public $defaultInformation;

    public $nameOfEntity = 'vendor';
    public $labelOfEntity = '事業者';

    /**
     * Constructor
     *
     * @param Wstd\Domain\Models\EntityInterface
     * @return void
     */
    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
        $this->defaultInformation = new DefaultInformation($entity);
    }

    /**
     * @todo
     */
    public function isEditable()
    {
        return true;
    }
}
