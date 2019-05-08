<?php

namespace Wstd\View\Models\Admin\Components\Forms;

use Spatie\ViewModels\ViewModel;

class InputText extends ViewModel implements FormInterface
{
    public $name;
    public $value;
    public $label;

    public $template = 'inputText';

    public function __construct(string $name, string $value, ?string $label = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
    }
}
