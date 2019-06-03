<?php

namespace Wstd\View\Presenters\Admin\Templates;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\ValueObjectInterface;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Admin\Modules\Content;
use Wstd\View\Presenters\Admin\Modules\FormContainer;

class Properties extends Content
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
    protected $propertyLabels = [];

    /**
     * @var array
     */
    protected $propertyValues = [];

    /**
     * @var array
     */
    protected $editableProperties = [];

    /**
     * @var Wstd\View\Presenters\Admin\Modules\FormContainer
     */
    public $form;

    /**
     * Default Blade template
     *
     * @var string
     */
    public $template = 'admin.templates.properties';

    protected $guarded = ['form'];

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
        $this->parseArguments($args);
        if (! empty($this->editableProperties) && is_array($this->editableProperties)) {
            $this->initFormItems($args);
        }
    }

    protected function initFormItems(array $args)
    {
        $formElements = [];
        foreach ($this->editableProperties as $property) {
            $method = Str::camel($property) . 'Form';
            if (method_exists($this, $method)) {
                $formElements[] = $this->{$method}(); /** @var Htmlable */
            }
            else if ($formItem = $this->formFactory($property)) {
                $formElements[] = $formItem;
            }
        }
        if (! empty($formElements)) {
            $id = $this->id . '_forms';
            $title = $toggle = '基本情報を編集する';
            $this->form = new FormContainer($formElements, compact('id', 'title', 'toggle'));
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
        if (isset($this->propertyValues[$property])) {
            return $this->propertyValues[$property]; // Unescaped!
        }
        $method = 'get' . Str::studly($property);
        if (method_exists($this->entity, $method)) {
            return e($this->entity->{$method}());
        }
        return '';
    }

    /**
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

        $label = FormFactory::makeLabel()->text($this->propertyLabel($property));
        $input = FormFactory::makeInputText([
            'name' => $property,
            'value' => $this->propertyValue($property),
        ]);

        return FormFactory::makeFormGroup($label, $input);
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
