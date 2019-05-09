<?php

namespace Wstd\View\Models\Admin\Includes;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Models\Admin\Traits\EntityInformationTrait;
use Wstd\View\Models\Admin\Traits\UtilityTrait;

class BelongsInformation extends ViewModel
{
    use UtilityTrait;
    use EntityInformationTrait;

    public $tabs = [];

    /**
     * @var array
     */
    public $belongs = [];

    /**
     * @var Wstd\View\Models\Admin\Includes\BelongsInterface
     */
    public function set(BelongsInterface $belong)
    {
        $this->belongs[] = $belong;
        $this->tabs[$belong->nameOfBelongs()] = $belong->labelOfBelongs();
    }
}
