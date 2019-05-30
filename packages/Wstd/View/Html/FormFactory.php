<?php

namespace Wstd\View\Html;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Arr;
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

    public static function makeInput(array $args = []): Htmlable
    {
        return El\Input::create()->attributes($args);
    }

    public static function makeInputText(array $args = []): Htmlable
    {
        $args['type'] = 'text';
        return static::makeInput($args);
    }

    public static function makeSelect(array $options, array $args = []): Htmlable
    {
        $value = Arr::pull($args, 'value', null);
        return El\Select::create()->options($options)->attributes($args)->value($value);
    }

    public static function makeLabel(array $args = []): Htmlable
    {
        return El\Label::create()->attributes($args);
    }

    public static function makeButton(array $args = []): Htmlable
    {
        return El\Button::create()->attributes($args);
    }

    public static function makeSubmit(array $args = []): Htmlable
    {
        $tag = Arr::pull($args, 'tag', 'button');
        $args['type'] = 'submit';
        if ($tag === 'button') {
            $text = Arr::pull($args, 'text', 'Submit');
            return static::makeButton($args)->text($text);
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
