<?php

namespace Wstd\View\Presenters\Admin\Modules;

use Illuminate\Support\Str;
use Wstd\View\Presenters\Presenter;

class TabContents extends Presenter
{
    /**
     * @var array
     */
    public $tabs = [];

    /**
     * @var array[Wstd\View\Presenters\Presenter]
     */
    public $contents = [];

    public $template = 'admin.modules.tabContents';

    /**
     * @see Spatie\ViewModels\ViewModel
     * @var array
     */
    protected $ignore = ['template', 'add'];

    protected $guarded = ['tabs', 'contents'];

    public function __construct($contents = [], array $args = [])
    {
        if ($contents && is_array($contents)) {
            foreach ($contents as $content) {
                $this->add($content);
            }
        }
        $this->parseArguments($args);
    }

    /**
     * @param Wstd\View\Presenters\Presenter $content
     */
    public function add(Presenter $content)
    {
        $id = $content->id;
        $content->title = $content->title ?? Str::title($id);
        $this->contents[] = $content;
        $this->tabs[$id] = $content->title;

        return $this;
    }
}
