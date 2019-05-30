<?php

namespace Wstd\View\Presenters\Admin\Modules;

use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Admin\Modules\HiddenForm;
use Wstd\View\Presenters\Presenter;

class Gallery extends Presenter
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var Illuminate\Database\Eloquent\Collection[Spatie\MediaLibrary\Models\Media]
     */
    public $items;

    /**
     * @var string
     */
    protected $fileKey;

    /**
     * @var Wstd\View\Presenters\Admin\Modules\HiddenForm
     */
    public $hiddenForm;

    public $template = 'admin.modules.gallery';

    /**
     * @param Illuminate\Database\Eloquent\Collection[Spatie\MediaLibrary\Models\Media] $items
     * @param array $args
     */
    public function __construct($items, array $args = [])
    {
        $this->items = $items;
        if (! empty($args)) {
            if (isset($args['items'])) {
                unset($args['items']);
            }
            if (isset($args['hiddenForm'])) {
                unset($args['hiddenForm']);
            }
            $this->parseArguments($args);
        }
        $this->initHiddenForm($args);
    }

    protected function initHiddenForm(array $args)
    {
        $args['id'] = $this->id . '_form';
        $args['title'] = '画像を追加する';
        $args['modalSize'] = 'large';
        $args['enctype'] = 'multipart/form-data';

        $this->hiddenForm = new HiddenForm($this->formElements(), $args);
    }

    protected function formElements()
    {
        $name = $id = $this->fileKey ?? 'add_to_' . $this->id;
        return [
            FormFactory::makeInputFile(compact('name', 'id'))
        ];
    }
}
