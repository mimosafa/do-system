<?php

namespace Wstd\View\Presenters\Admin\Modules;

use Illuminate\Support\Arr;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Presenter;

class HiddenForm extends Presenter
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string|null
     */
    public $title;

    /**
     * @var string|null
     */
    public $modalSize;

    /**
     * @var string|null
     */
    public $modalDismiss;

    /**
     * @var bool
     */
    public $modalSubmittable = true;

    /**
     * @var Wstd\View\Presenters\Admin\Modules\FormContainer
     */
    public $formContainer;

    /**
     * @var Illuminate\Contracts\Support\Htmlable
     */
    public $modalTrigger;

    public $template = 'admin.modules.hiddenForm';

    public function __construct($formItems = [], array $args = [])
    {
        if (! empty($args)) {
            if (isset($args['formContainer'])) {
                unset($args['formContainer']);
            }
            $this->parseArguments($args);
        }
        $this->formContainer = new FormContainer($formItems, $args);
        $this->initModalTrigger($args);
    }

    protected function initModalTrigger(array $args)
    {
        $trigger = $args['trigger'] ?? 'Edit';
        
        $this->modalTrigger = FormFactory::makeButton([
            'type' => 'button',
            'data-toggle' => 'modal',
            'data-target' => '#' . $this->id,
            'class' => 'btn-primary btn-block btn-sm',
        ])->html('<b>' . $trigger . '</b>');
    }
}
