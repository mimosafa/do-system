<?php

namespace Wstd\View\Presenters\Admin;

use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\ValueObjectInterface;

class VendorShowProperties extends ViewModel
{
    /**
     * @var string
     */
    public $id = 'vendor';

    /**
     * @var Wstd\Domain\Models\EntityInterface
     */
    protected $entity;

    /**
     * @var array
     */
    public $properties = [
        'id',
        'status',
    ];

    /**
     * @var array
     */
    public $propertyLabels = [];

    public $template = 'admin.modules.properties';

    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
    }

    public function header(): string
    {
        return '';
    }

    public function propertyLabel(string $property)
    {
        if (isset($this->properties[$property])) {
            return e($this->properties[$property]);
        }
        $maybeValueObjectClass = get_class($this->entity) . 'Value' . Str::studly($property);
        if (class_exists($maybeValueObjectClass)) {
            $methodStr = $maybeValueObjectClass . '::valueObjectLabel';
            return e($methodStr());
        }
        return Str::title($property);
    }

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
