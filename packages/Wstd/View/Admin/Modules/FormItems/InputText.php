<?php

namespace Wstd\View\Admin\Modules\FormItems;

use Spatie\ViewModels\ViewModel;
use Wstd\View\Admin\Traits\UtilityTrait;

class InputText extends ViewModel implements FormItemInterface
{
    use UtilityTrait;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $value;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string Blade template
     */
    protected $template = 'adminWstd.modules.formItems.inputText';

    /**
     * @param string $name
     * @param array{id:?string,value:?string,label:?string} $args
     */
    public function __construct(string $name, array $args = [])
    {
        $this->name = $name;
        $this->id = $args['id'] ?? $this->name;
        $this->value = $args['value'] ?? '';
        $this->label = $args['label'] ?? $this->strTitle($this->name);
    }

    public function template()
    {
        return $this->template;
    }
}
