<?php

namespace Wstd\View\Models\Admin\Pages\Cars;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Models\Admin\AbstractShowViewModel;

class ShowViewModel extends AbstractShowViewModel
{
    public $nameOfEntity = 'car';
    public $labelOfEntity = '車両';

    /**
     * Constructor
     *
     * @param Wstd\Domain\Models\EntityInterface
     * @return void
     */
    public function __construct(EntityInterface $entity)
    {
        parent::__construct($entity);
        $this->defaultInformation = new DefaultInformation($entity);
    }
}
