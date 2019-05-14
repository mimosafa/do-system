<?php

namespace Wstd\View\Admin\Includes;

use Spatie\ViewModels\ViewModel;
use Wstd\View\Admin\Modules\FormItems\FormItemInterface;

class FormItemContainer extends ViewModel
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

    public function template()
    {
        return $this->template;
    }
}
