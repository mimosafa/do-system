<?php

namespace Wstd\View\Presenters\Admin\Modules;

use Illuminate\Support\Arr;
use Wstd\View\Presenters\Presenter;

class Sections extends Presenter
{
    public $sections;

    protected $ignored = ['add'];

    public function __construct($sections = [], array $args = [])
    {
        if (! empty($sections)) {
            foreach (Arr::wrap($sections) as $section) {
                $this->add($section);
            }
        }
        $this->parseArguments($args);
    }

    public function add(Section $section)
    {
        $this->sections[] = $section;

        return $this;
    }
}
