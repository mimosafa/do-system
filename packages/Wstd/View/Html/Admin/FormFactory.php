<?php

namespace Wstd\View\Html\Admin;

use Illuminate\Contracts\Support\Htmlable;
use Spatie\Html\Elements as El;
use Wstd\Domain\Models\ValueObjectInterface;
use Wstd\Domain\Models\ValueObjectEnum;
use Wstd\Domain\Models\ValueObjectText;
use Wstd\View\Html\FormFactory as BaseFormFactory;

class FormFactory extends BaseFormFactory
{
    public static function makeFromValueObject(ValueObjectInterface $valueObject, array $args = []): Htmlable
    {
        $labelText = $valueObject::valueObjectLabel();
        if (isset($args['label'])) {
            $labelText = $args['label'];
            unset($args['label']);
        }
        $label = El\Label::create()->text($labelText);
        if (isset($args['name'])) {
            $label->attribute('for', $args['name']);
        }

        $form = parent::makeFromValueObject($valueObject, $args);

        return El\Div::create()->class('form-group')->children([$label, $form]);
    }

    public static function makeInputText(array $args = []): Htmlable
    {
        $element = parent::makeInputText($args);
        return $element->class('form-control');
    }

    public static function makeSelect(array $options, array $args = []): Htmlable
    {
        $element = parent::makeSelect($options, $args);
        return $element->class('form-control');
    }
}
