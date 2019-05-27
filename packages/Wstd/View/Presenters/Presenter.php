<?php

namespace Wstd\View\Presenters;

use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;

abstract class Presenter extends ViewModel
{
    /**
     * @var string
     */
    public $id;

    /**
     * Should be used by constructor
     *
     * @param array $args
     * @return void
     */
    protected function parseArguments(array $args)
    {
        $properties = array_keys(get_object_vars($this));
        foreach ($args as $key => $val) {
            if (in_array($key, $properties, true)) {
                $this->{$key} = $val;
            }
        }
        if (! isset($this->id)) {
            $this->id = e(spl_object_hash($this));
        }
    }
}
