<?php

namespace Wstd\View\Presenters\Admin\Templates;

use Illuminate\Support\Str;
use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Presenters\Presenter;

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
     * @var array|null
     */
    public $editableProperties;

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
}
