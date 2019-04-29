<?php

namespace Wstd\Equipment\View\Models\Admin;

use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

abstract class AbstractIndexViewModel extends ViewModel
{
    /**
     * @var string
     */
    public $nameOfIndexed;

    /**
     * @var string
     */
    public $labelOfIndexed;

    /**
     * @var bool
     */
    public $isDataTable = false;

    /**
     * @var array
     */
    public $itemsOfIndexed;

    /**
     * @var array
     */
    public $itemLabelsOfIndexed;

    /**
     * Return items for index
     *
     * @return Collection
     */
    abstract public function list(): Collection;

    public function trAttributesCallback($model)
    {
        $attr  = '';
        if ($classes = $this->trClassesCallback($model)) {
            $attr .= 'class="' . implode(' ', $classes) . '" ';
        }
        $attr .= $this->trMiscCallback($model);

        return $attr;
    }

    protected function trClassesCallback($model): array
    {
        $classes = [];
        return $classes;
    }

    protected function trMiscCallback($model)
    {
        //
    }
}
