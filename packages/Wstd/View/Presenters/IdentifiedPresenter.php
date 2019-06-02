<?php

namespace Wstd\View\Presenters;

abstract class IdentifiedPresenter extends Presenter
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    protected function parseArguments(array $args)
    {
        parent::parseArguments($args);
        if (! isset($this->id) || ! filter_var($this->id)) {
            throw \Exception('$id property is not defined.');
        }
        if (! isset($this->title) || ! filter_var($this->title)) {
            $this->title = Str::title($this->id);
        }
    }
}
