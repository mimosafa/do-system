<?php

namespace Wstd\View\Admin\Includes;

use Spatie\ViewModels\ViewModel;
use Wstd\View\Admin\ViewModelInterface;
use Wstd\View\Admin\Modules\FormItems\FormItemInterface;

class FormItemContainer extends ViewModel implements ViewModelInterface
{
    /**
     * @var array
     */
    public $items = [];

    /**
     * @var string Blade template
     */
    protected $template = 'adminWstd.includes.formItemContainer';

    /**
     * @param Wstd\View\Admin\Modules\FormItems\FormItemInterface
     */
    public function add(FormItemInterface $item)
    {
        $this->items[] = $item;
    }

    public function template(): string
    {
        return $this->template;
    }
}
