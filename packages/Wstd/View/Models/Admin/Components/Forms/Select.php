<?php

namespace Wstd\View\Models\Admin\Components\Forms;

use Spatie\ViewModels\ViewModel;

class Select extends ViewModel implements FormInterface
{
    public $name;
    public $value;
    public $label;

    /**
     * @var array
     */
    public $options;

    /**
     * @var callable
     */
    public $optionGetValue;

    /**
     * @var callable
     */
    public $optionIsSelected;

    /**
     * @var callable
     */
    public $optionGetLabel;

    public $template = 'select';

    public function __construct(
        string $name,
        string $value,
        array $options,
        callable $optionGetValue,
        callable $optionIsSelected,
        ?callable $optionGetLabel = null,
        ?string $label = null
    )
    {
        $this->name = $name;
        $this->value = $value;
        $this->options = $options;
        $this->optionGetValue = $optionGetValue;
        $this->optionIsSelected = $optionIsSelected;
        $this->optionGetLabel = $optionGetLabel;
        $this->label = $label;
    }
}
