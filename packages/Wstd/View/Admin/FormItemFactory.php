<?php

namespace Wstd\View\Admin;

use Wstd\Domain\Models\ValueObjectInterface;
use Wstd\Domain\Models\ValueObjectEnum;
use Wstd\Domain\Models\ValueObjectText;
use Wstd\View\Admin\Modules\FormItems\FormItemInterface;
use Wstd\View\Admin\Modules\FormItems\InputText;
use Wstd\View\Admin\Modules\FormItems\Select;

class FormItemFactory
{
    public static function makeFromValueObject(ValueObjectInterface $vo, $args = []): FormItemInterface
    {
        $args = array_merge([
            'name'  => $vo::valueObjectName(),
            'value' => $vo->getValue(),
            'label' => $vo::valueObjectLabel(),
        ], array_filter($args));
        $name = $args['name'];
        unset($args['name']);

        if ($vo instanceof ValueObjectText) {
            return self::makeInputText($name, $args);
        }
        else if ($vo instanceof ValueObjectEnum) {
            $values = $vo::values();
            $options = [];
            foreach ($values as $val) {
                $options[$val->getLabel()] = $val->getValue();
            }
            return self::makeSelect($name, $options, $args);
        }
    }

    public static function makeInputText(string $name, array $args = []): FormItemInterface
    {
        return new InputText($name, $args);
    }

    public static function makeSelect(string $name, array $options, array $args = []): FormItemInterface
    {
        return new Select($name, $options, $args);
    }
}
