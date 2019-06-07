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

    /**
     * @var Wstd\View\Presenters\Admin\Modules\FormContainer
     */
    public $form;

    public $addable = false;
    protected $nameForAdd;
    protected $defaultNameForAdd = 'image';

    public $sortable = false;
    protected $beforeSort = [];
    protected $nameForSort;
    protected $defaultNameForSort = 'images';
    protected $updateItemsOrder = 'Save items order';

    public $modalSize = 'large';

    public $template = 'admin.modules.gallery';

    protected $guarded = ['items', 'defaultNameForAdd', 'defaultNameForSort',];

    /**
     * @param Illuminate\Database\Eloquent\Collection[Spatie\MediaLibrary\Models\Media] $items
     * @param array $args
     */
    public function __construct($items, array $args = [])
    {
        $this->items = $items;
        $this->parseArguments($args);
        if ($this->addable) {
            $this->initForm();
        }
        if ($this->sortable) {
            $this->initSortable();
        }
    }

    protected function nameForAdd()
    {
        return $this->nameForAdd ?? $this->defaultNameForAdd;
    }

    protected function nameForSort()
    {
        return $this->nameForSort ?? $this->defaultNameForSort;
    }

    protected function initForm()
    {
        $form = FormFactory::makeInputFile([
            'name' => $this->nameForAdd(),
        ]);

        $id = 'add_' . $this->id;
        $title = strip_tags($this->title) . 'を追加する';
        $modalSize = 'lg';
        $action = $this->action;
        $enctype = 'multipart/form-data';
        $toggle = I::create()->class('fa fa-fw fa-plus-circle');
        $toggleAttributes = [
            'tag' => 'a',
            'href' => '#',
        ];

        $this->form = new FormContainer($form, compact(
            'id', 'title', 'action', 'enctype', 'toggle', 'toggleAttributes'
        ));
    }

    protected function initSortable()
    {
        $this->items->each(function ($item, $i) {
            $this->beforeSort[$i] = $item->id;
        });
    }

    public function sortResult()
    {
        $dataName = $this->nameForSort();
        $dataOld = $value = implode(',', $this->beforeSort);

        return FormFactory::makeInputHidden([
            'data-name' => $dataName,
            'data-old' => $dataOld,
            'value' => $value,
            'class' => 'sort-result',
        ]);
    }

    public function sortSubmit()
    {
        return FormFactory::makeButton([
            'text' => $this->updateItemsOrder,
            'class' => 'btn btn-info btn-block btn-sm',
            'style' => 'margin-top: 15px; visibility: hidden;',
            'disabled' => 'disabled',
            // 'onclick' => 'return false;',
        ]);
    }
}
