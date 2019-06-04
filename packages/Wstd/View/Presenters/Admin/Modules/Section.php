<?php

namespace Wstd\View\Presenters\Admin\Modules;

use Wstd\View\Presenters\Presenter;

class Section extends Presenter
{
    public $header;

    public $content;

    public function __construct(string $content, array $args = [])
    {
        $this->content = $content;
        if (isset($args['header']) && filter_var($args['header'])) {
            $this->header = $args['header'];
        }
        $this->parseArguments($args);
    }
}
