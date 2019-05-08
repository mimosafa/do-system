<?php

namespace Wstd\Equipment\View\Models\Admin\Modules\Show;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\EntityInterface;

class DefaultInformation extends ViewModel
{
    /**
     * @var Wstd\Domain\Models\EntityInterface
     */
    public $model;

    /**
     * @var array[string]
     */
    public $items = [
        'id',
        'status',
    ];

    /**
     * @var array
     */
    public $itemLabels = [
        'id' => 'ID',
        'status' => '状態',
    ];

    /**
     * @var array
     */
    public $editableItems = [
        'name',
        'status',
    ];

    /**
     * Constructor
     *
     * @param Wstd\Domain\Models\EntityInterface
     * @return void
     */
    public function __construct(EntityInterface $model)
    {
        $this->model = $model;
    }

    public function header()
    {
        $name = e($this->model->getName());
        return <<< HEADER
            <small class="muted">事業者名</small>
            <br>
            $name
HEADER;
    }

    public function idCallback()
    {
        return $this->model->getId();
    }

    public function statusCallback()
    {
        return $this->model->getStatus()->getLabel();
    }
}
