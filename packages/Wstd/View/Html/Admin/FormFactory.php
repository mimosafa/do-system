<?php

namespace Wstd\View\Html\Admin;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Arr;
use Spatie\Html\Elements as El;
use Wstd\View\Html\FormFactory as BaseFormFactory;

class FormFactory extends BaseFormFactory
{
    public static function makeInput(array $args = []): Htmlable
    {
        $classes = [];
        if (isset($args['type'])) {
            if (in_array($args['type'], ['button', 'submit', 'reset'])) {
                $classes[] = 'btn';
                if ($args['type'] === 'submit') {
                    $classes[] = 'btn-primary';
                }
            }
        }
        return parent::makeInput($args)->class($classes);
    }

    public static function makeInputText(array $args = []): Htmlable
    {
        return self::makeFormGroup(
            self::makeLabelFromArguments($args),
            parent::makeInputText($args)->class('form-control')
        );
    }

    public static function makeSelect(array $options, array $args = []): Htmlable
    {
        return self::makeFormGroup(
            self::makeLabelFromArguments($args),
            parent::makeSelect($options, $args)->class('form-control')
        );
    }

    public static function makeButton(array $args = []): Htmlable
    {
        $classes = ['btn'];
        if (isset($args['type'])) {
            if ($args['type'] === 'submit') {
                $classes[] = 'btn-primary';
            }
        }
        return parent::makeButton($args)->class($classes);
    }

    public static function makeFormGroup(...$children): Htmlable
    {
        return El\Div::create()->class('form-group')->children(Arr::wrap($children));
    }

    protected static function makeLabelFromArguments(array &$args): ?Htmlable
    {
        if (! $text = Arr::pull($args, 'label', false)) {
            return null;
        }
        $label = parent::makeLabel()->text($text);
        if (isset($args['id'])) {
            $label = $label->for($args['id']);
        }
        return $label;
    }
}
