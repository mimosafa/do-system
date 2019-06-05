<?php

namespace Wstd\View\Presenters\Admin\Modules;

use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\IdentifiedPresenter;
use Wstd\View\Presenters\Presenter;

class Content extends IdentifiedPresenter
{
    /**
     * @var string
     */
    public $id;
    public $title;

    /**
     * @var Wstd\View\Presenters\Presenter
     */
    public $content;

    /**
     * @var string
     */
    public $modalContext;
    public $modalSize;

    /**
     * @var Wstd\View\Presenters\Admin\Modules\FormContainer|null
     */
    public $form;

    protected $guarded = ['content'];

    /**
     * @param Wstd\View\Presenters\Presenter|string $content
     * @param array $args
     */
    public function __construct($content, array $args = [])
    {
        $this->content = $content;
        $this->parseArguments($args);
    }
}
