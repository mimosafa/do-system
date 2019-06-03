<?php

namespace Wstd\View\Presenters\Admin\Modules;

use Illuminate\Support\Arr;
use Wstd\View\Presenters\IdentifiedPresenter;
use Wstd\View\Presenters\Presenter;

class Contents extends Presenter
{
    public $indexes = [];

    /**
     * @var array
     */
    public $contents = [];

    /**
     * @var string|null
     */
    public $boxContext;
    /**
     * @var bool|null
     */
    public $collapsable;
    public $removal;

    public $template = 'admin.modules.contents';

    protected $guarded = ['indexes', 'contents',];

    protected $ignored = ['add',];

    public function __construct($contents = [], array $args = [])
    {
        if (! empty($contents)) {
            foreach (Arr::wrap($contents) as $content) {
                $this->add($content);
            }
        }
        $this->parseArguments($args);
    }

    public function add(IdentifiedPresenter $content)
    {
        $this->indexes[$content->id] = $content->title;
        $this->contents[$content->id] = $content;

        return $this;
    }
}
