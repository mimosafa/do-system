<?php

namespace Wstd\View\Presenters\Admin\Traits;

use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Admin\Modules\HiddenForm;

trait VendorsShowBelongs
{
    /**
     * @var bool
     */
    public $addable = false;

    /**
     * @var int
     */
    protected $vendor_id;

    protected $traitTemplate = 'admin.traits.vendorsShowBelongs';

    /**
     * @abstract
     * @return array[Illuminate\Contracts\Support\Htmlable]
     */
    abstract public function formElements(): array;

    /**
     * @var string
     */
    public function overWriteTemplate()
    {
        return $this->addable ? $this->traitTemplate : '';
    }

    protected function hiddenFormId(): string
    {
        return 'add_' . $this->id;
    }

    /**
     * @abstract
     * @return Wstd\View\Presenters\Admin\Modules\HiddenForm
     */
    public function hiddenForm(): HiddenForm
    {
        $id = $this->hiddenFormId();
        $title = $trigger = $this->collectionName . 'を追加する';
        $method = $this->method ?? null;
        $action = $this->action ?? null;

        return new HiddenForm($this->formElements(), compact(
            'id', 'title', 'trigger', 'method', 'action'
        ));
    }

    /**
     * @return string
     */
    public function afterTable(): string
    {
        if (! isset($this->addable) || ! $this->addable) {
            return '';
        }
        return <<<AFTR
        <a href="#" data-toggle="modal" data-target="#{$this->hiddenFormId()}" class="btn btn-primary btn-block btn-sm">
            <b>{$this->collectionName}を追加する</b>
        </a>
AFTR;
    }
}
