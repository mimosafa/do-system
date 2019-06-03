<?php

namespace Wstd\View\Presenters\Admin\Modules;

use Spatie\Html\Elements\I;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Admin\Modules\Content;

class Gallery extends Content
{
    /**
     * @var string
     */
    public $id;
    public $title;

    public $action;

    /**
     * @var Illuminate\Database\Eloquent\Collection[Spatie\MediaLibrary\Models\Media]
     */
    public $items;

    public $form;

    public $modalSize = 'large';

    public $template = 'admin.modules.gallery';

    protected $guarded = ['items',];

    /**
     * @param Illuminate\Database\Eloquent\Collection[Spatie\MediaLibrary\Models\Media] $items
     * @param array $args
     */
    public function __construct($items, array $args = [])
    {
        $this->items = $items;
        $this->parseArguments($args);
        $this->initForm();
    }

    protected function initForm()
    {
        $form = FormFactory::makeInputFile([
            'name' => 'image',
        ]);

        $id = 'add_' . $this->id;
        $title = $this->title . 'を追加する';
        $modalSize = 'lg';
        $action = $this->action;
        $enctype = 'multipart/form-data';
        $toggle = I::create()->class('fa fa-fw fa-plus-circle');
        $toggleAttributes = [
            'tag' => 'a',
            'href' => '#',
            'class' => 'adminGalleryAddItem',
        ];

        $this->form = new FormContainer($form, compact(
            'id', 'title', 'action', 'enctype', 'toggle', 'toggleAttributes'
        ));
    }
}
