<?php

namespace Wstd\View\Presenters\Admin\Templates;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;
use Spatie\Html\Elements\Div;
use Spatie\Html\Elements\Input;
use Spatie\Html\Elements\Label;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\ValueObjectInterface;
use Wstd\View\Presenters\Presenter;
use Wstd\View\Html\Admin\FormFactory;

class Properties extends Presenter
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var Wstd\Domain\Models\EntityInterface
     */
    protected $entity;

    /**
     * @var string|null
     */
    public $header;

    /**
     * @var array
     */
    public $properties = [];

    /**
     * @var array
     */
    public $propertyLabels = [];

    /**
     * @var array
     */
    public $editableProperties = [];

    /**
     * @var array[Illuminate\Contracts\Support\Htmlable]
     */
    public $formElements = [];

    /**
     * Default Blade template
     *
     * @var string
     */
    public $template = 'admin.templates.properties';

    /**
     * Constructor
     *
     * @uses Wstd\View\Presenters\Presenter::parseArguments(array)
     *
     * @param Wstd\Domain\Models\EntityInterface $entity
     * @param array $args
     */
    public function __construct(EntityInterface $entity, array $args = [])
    {
        $this->entity = $entity;
        if (! empty($args)) {
            $this->parseArguments($args);
        }
        if (! empty($this->editableProperties) && is_array($this->editableProperties)) {
            $this->initFormItems();
        }
    }

    protected function initFormItems()
    {
        foreach ($this->editableProperties as $property) {
            $method = Str::camel($property) . 'Form';
            if (method_exists($this, $method)) {
                $this->formElements[] = $this->{$method}(); /** @var Htmlable */
            }
            else if ($formItem = $this->formFactory($property)) {
                $this->formElements[] = $formItem;
            }
        }
    }

    /**
     * @param string
     * @return string
     */
    public function propertyLabel(string $property)
    {
        if (isset($this->propertyLabels[$property])) {
            return e($this->propertyLabels[$property]);
        }
        $maybeValueObjectClass = get_class($this->entity) . 'Value' . Str::studly($property);
        if (class_exists($maybeValueObjectClass)) {
            $methodStr = $maybeValueObjectClass . '::valueObjectLabel';
            return e($methodStr());
        }
        return Str::title($property);
    }

    /**
     * @param string
     * @return string
     */
    public function propertyValue(string $property)
    {
        $method = 'get' . Str::studly($property);
        if (method_exists($this, $method)) {
            return $this->{$method}();
        }
        if (method_exists($this->entity, $method)) {
            return $this->entity->{$method}();
        }
        return '';
    }

    /**
     * @uses Spatie\Html\Elements\Div
     * @uses Spatie\Html\Elements\Label
     * @uses Spatie\Html\Elements\Input
     *
     * @param string $property
     * @return Illuminate\Contracts\Support\Htmlable
     */
    protected function formFactory(string $property): Htmlable
    {
        if ($valueObject = $this->getValueObject($property)) {
            return FormFactory::makeFromValueObject($valueObject, [
                'name' => $property,
                'label' => $this->propertyLabel($property),
            ]);
        }

        $label = Label::create()
            ->for($property)
            ->text($this->propertyLabel($property));
        $input = Input::create()->type('text')->class('form-control')
            ->name('property')
            ->value($this->propertyValue($property));

        return Div::create()->class('form-group')->children([$label, $input]);
    }

    /**
     * @param string $key
     * @return Wstd\Domain\Models\ValueObjectInterface|null
     */
    protected function getValueObject(string $key): ?ValueObjectInterface
    {
        $method = 'get' . Str::studly($key);
        if (method_exists($this->entity, $method)) {
            $value = $this->entity->{$method}();
            return $value instanceof ValueObjectInterface ? $value : null;
        }
        return null;
    }
}
