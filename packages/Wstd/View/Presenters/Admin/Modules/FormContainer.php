<?php

namespace Wstd\View\Presenters\Admin\Modules;

use Illuminate\Contracts\Support\Htmlable;
use Wstd\View\Presenters\Presenter;

class FormContainer extends Presenter
{
    /**
     * @var array[Illuminate\Contracts\Support\Htmlable]
     */
    public $formItems = [];

    /**
     * @var string
     */
    public $template = 'admin.modules.formContainer';

    /**
     * @param array[Illuminate\Contracts\Support\Htmlable] $formItems
     * @param array $args
     */
    public function __construct(array $formItems = [], array $args = [])
    {
        foreach ($formItems as $formItem) {
            $this->add($formItem);
        }
        if (! empty($args)) {
            if (isset($args['formItems'])) {
                unset($args['formItems']);
            }
            $this->parseArguments($args);
        }
    }

    /**
     * @param Illuminate\Contracts\Support\Htmlable $formItem
     */
    public function add(Htmlable $formItem)
    {
        $this->formItems[] = $formItem;
    }

    public function hasForms()
    {
        return ! empty($this->formItems);
    }
}
