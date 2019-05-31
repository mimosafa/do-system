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

    protected $close = 'Close';

    /**
     * @var Wstd\View\Presenters\Admin\Modules\FormContainer
     */
    public $formContainer;

    /**
     * @var Illuminate\Contracts\Support\Htmlable
     */
    public $modalTrigger;

    public $template = 'admin.modules.hiddenForm';

    protected $guarded = ['formContainer'];

    public function __construct($formItems = [], array $args = [])
    {
        $this->formContainer = new FormContainer($formItems, $args);
        $this->parseArguments($args);
        $this->initModalTrigger($args);
    }

    protected function initModalTrigger(array $args)
    {
        $trigger = $args['trigger'] ?? 'Edit';

        $this->modalTrigger = FormFactory::makeButton([
            'type' => 'button',
            'data-toggle' => 'modal',
            'data-target' => '#' . e($this->id),
            'class' => 'btn-primary btn-block btn-sm',
        ])->html('<b>' . e($trigger) . '</b>');
    }
}
