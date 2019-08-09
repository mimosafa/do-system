<?php

namespace Wstd\View\Html;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Arr;
use Illuminate\Support\HtmlString;
use Spatie\Html\Elements as El;
use Wstd\Domain\Models\ValueObjectInterface;
use Wstd\Domain\Models\ValueObjectEnum;
use Wstd\Domain\Models\ValueObjectText;

class FormFactory
{
    public static function makeFromValueObject(ValueObjectInterface $valueObject, array $args = []): Htmlable
    {
        if (! isset($args['name'])) {
            $args['name'] = $valueObject::valueObjectName();
        }
        if (! isset($args['value'])) {
            $value = $valueObject->getValue();
            if (! is_null($value)) {
                $args['value'] = $value;
            }
        }

        if ($valueObject instanceof ValueObjectText) {
            return static::makeInputText($args);
        }
        if ($valueObject instanceof ValueObjectEnum) {
            $options = [];
            foreach ($valueObject::values() as $vo) {
                $options[$vo->getValue()] = $vo->getLabel();
            }
            return static::makeSelect($options, $args);
        }

        return static::makeInputText($args)->readonly();
    }

    public static function makeA(array $args = []): Htmlable
    {
        return El\A::create()->attributes($args);
    }

    public static function makeInput(array $args = []): Htmlable
    {
        return El\Input::create()->attributes($args);
    }

    public static function makeInputText(array $args = []): Htmlable
    {
        $args['type'] = 'text';
        return static::makeInput($args);
    }

    public static function makeInputDate(array $args = []): Htmlable
    {
        $args['type'] = 'date';
        return static::makeInput($args);
    }

    public static function makeInputFile(array $args = []): Htmlable
    {
        $args['type'] = 'file';
        return static::makeInput($args);
    }

    public static function makeInputHidden(array $args = []): Htmlable
    {
        $args['type'] = 'hidden';
        return static::makeInput($args);
    }

    public static function makeTextarea(array $args = []): Htmlable
    {
        $value = Arr::pull($args, 'value', null);
        return El\Textarea::create()->attributes($args)->value($value);
    }

    public static function makeSelect(array $options, array $args = []): Htmlable
    {
        $multiple = Arr::pull($args, 'multiple', false);
        $value = Arr::pull($args, 'value', null);
        $select = El\Select::create()->options($options)->attributes($args);
        if (filter_var($multiple, \FILTER_VALIDATE_BOOLEAN)) {
            $select = $select->multiple();
        }
        if (! empty($value)) {
            $select = $select->value($value);
        }
        return $select;
    }

    public static function makeCheckboxes(array $options, array $args = []): Htmlable
    {
        $value = Arr::pull($args, 'value', []);
        if ($name = Arr::pull($args, 'name')) {
            $name .= '[]';
        }
        $class = Arr::pull($args, 'class');
        if (is_array($class)) {
            $class = implode(' ', $class);
        }
        $labelClass = Arr::pull($args, 'labelClass');
        if (is_array($labelClass)) {
            $labelClass = implode(' ', $labelClass);
        }

        $html = '';
        foreach ($options as $val => $label) {
            $html .= '<label';
            if ($labelClass) {
                $html .= ' class="' . e($labelClass) . '"';
            }
            $html .= '>' . "\n";
            $html .= "\t" . '<input type="checkbox" value="' . e($val) . '"';
            if ($class) {
                $html .= ' class="' . e($class) . '"';
            }
            if ($name) {
                $html .= ' name="' . e($name) . '"';
            }
            if (in_array($val, (array) $value)) {
                $html .= ' checked';
            }
            $html .= '> ' . e($label) . "\n";
            $html .= '</label>';
        }

        return new HtmlString($html);
    }

    public static function makeLabel(array $args = []): Htmlable
    {
        return El\Label::create()->attributes($args);
    }

    public static function makeButton(array $args = []): Htmlable
    {
        $text = Arr::pull($args, 'text');
        return El\Button::create()->attributes($args)->text($text);
    }

    public static function makeSubmit(array $args = []): Htmlable
    {
        $tag = Arr::pull($args, 'tag', 'button');
        $args['type'] = 'submit';
        if ($tag === 'button') {
            $args['text'] = $args['text'] ?? 'Submit';
            return static::makeButton($args);
        }
        else if ($tag === 'input') {
            return static::makeInput($args);
        }
    }

    public static function makeDiv(array $args = []): Htmlable
    {
        return El\Div::create()->attributes($args);
    }
}
