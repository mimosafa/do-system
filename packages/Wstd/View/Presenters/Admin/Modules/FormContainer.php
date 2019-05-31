<?php

namespace Wstd\View\Presenters\Admin\Modules;

use ArrayIterator;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Arr;
use IteratorAggregate;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Presenter;

class FormContainer extends Presenter implements IteratorAggregate
{
    /**
     * @var string|null
     */
    public $title;

    /**
     * @var array[Illuminate\Contracts\Support\Htmlable]
     */
    public $formItems = [];

    /**
     * @var string
     */
    protected $submit = 'Submit';

    /**
     * @var string|null 'post' or 'get'
     */
    protected $method;

    /**
     * @var string|null Especialy submit action
     */
    protected $action;

    /**
     * @var string|null
     */
    protected $enctype;

    /**
     * No template
     *
     * @var string
     */
    public $template = '';

    protected $ignored = ['add', 'hasForms', 'getIterator'];

    protected $guarded = ['formItems'];

    /**
     * @param mixed $formItems
     * @param array $args
     */
    public function __construct($formItems = [], array $args = [])
    {
        if ($formItems) {
            foreach (Arr::wrap($formItems) as $formItem) {
                $this->add($formItem);
            }
        }
        $this->parseArguments($args);
    }

    /**
     * @param Illuminate\Contracts\Support\Htmlable $formItem
     */
    public function add(Htmlable $formItem)
    {
        $this->formItems[] = $formItem;
    }

    public function hasForms(): bool
    {
        return ! empty($this->formItems);
    }

    public function submit(): Htmlable
    {
        $args = $this->submitArguments();
        return FormFactory::makeSubmit($args)->text($this->submit);
    }

    protected function submitArguments(): array
    {
        $args = [];
        if (isset($this->method)) {
            $method = strtolower($this->method);
            if (in_array($method, ['post', 'get'], true)) {
                $args['formmethod'] = $method;
            }
        }
        if (isset($this->action)) {
            $args['formaction'] = e($this->action);
        }
        if (isset($this->enctype)) {
            if (in_array($this->enctype, ['multipart/form-data', 'text/plain'], true)) {
                $args['formenctype'] = $this->enctype;
            }
        }
        return $args;
    }

    public function getIterator() {
        return new ArrayIterator($this->formItems);
    }
}
