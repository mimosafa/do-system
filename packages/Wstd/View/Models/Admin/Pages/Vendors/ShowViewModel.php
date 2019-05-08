<?php

namespace Wstd\View\Models\Admin\Pages\Vendors;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Models\Admin\AbstractShowViewModel;

class ShowViewModel extends AbstractShowViewModel
{
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
        parent::__construct($entity);
        $this->defaultInformation = new DefaultInformation($entity);
    }
}
