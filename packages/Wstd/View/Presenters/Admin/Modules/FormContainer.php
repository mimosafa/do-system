<?php

namespace Wstd\View\Presenters\Admin\Modules;

use ArrayIterator;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Arr;
use IteratorAggregate;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\IdentifiedPresenter;

class FormContainer extends IdentifiedPresenter implements IteratorAggregate
{
    /**
     * @var string
     */
    public $id;
    public $title;

    /**
     * @var array[Illuminate\Contracts\Support\Htmlable]
     */
    public $formItems = [];

    /**
     * @var string
     */
    protected $submit = 'Submit';

    protected $toggle = 'Edit';
    protected $toggleAttributes = [];

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
        return FormFactory::makeSubmit($args)->text($this->submit);
    }

    public function toggle()
    {
        $tag = Arr::pull($this->toggleAttributes, 'tag', 'button');
        $type = Arr::pull($this->toggleAttributes, 'type', 'button');
        $class = Arr::pull($this->toggleAttributes, 'class', 'btn-primary btn-block btn-sm');
        if (is_array($class)) {
            $class = implode(' ', $class);
        }
        $attributes = array_merge($this->toggleAttributes, [
            'class' => $class,
            'data-toggle' => 'modal',
            'data-target' => '#' . $this->id,
        ]);
        if ($tag === 'button') {
            $toggle = FormFactory::makeButton($attributes + ['type' => $type]);
        }
        else if ($tag === 'input') {
            $toggle = FormFactory::makeInput($attributes + ['type' => $type]);
        }
        else if ($tag === 'a') {
            $toggle = FormFactory::makeA($attributes);
        }
        if (! isset($toggle)) {
            throw new \Exception();
        }
        return $toggle->html('<b>' . e($this->toggle) . '</b>');
    }

    /**
     * @see IteratorAggregate
     */
    public function getIterator() {
        return new ArrayIterator($this->formItems);
    }
}
