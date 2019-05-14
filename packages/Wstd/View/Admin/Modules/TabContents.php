<?php

namespace Wstd\View\Admin\Modules;

use Spatie\ViewModels\ViewModel;
use Wstd\View\Admin\ContentInterface;

class TabContents extends ViewModel
{
    /**
     * @var string html element id string
     */
    public $id;

    public $tabs = [];

    public $contents = [];

    /**
     * @var string Blade template
     */
    public $template = 'adminWstd.modules.tabContents';

    public function __construct(string $id, array $contents = [])
    {
        $this->id = $id;
        if ($contents) {
            foreach ($contents as $content) {
                $this->add($content);
            }
        }
    }

    public function add(ContentInterface $content)
    {
        $this->contents[] = $content;
        $this->tabs[$content->id()] = $content->title();
    }

    public function template()
    {
        return $this->template;
    }
}
