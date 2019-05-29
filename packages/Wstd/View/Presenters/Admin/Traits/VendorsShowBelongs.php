<?php

namespace Wstd\View\Presenters\Admin\Traits;

use Wstd\View\Html\Admin\FormFactory;

trait VendorsShowBelongs
{
    /**
     * @var bool
     */
    public $addable = false;

    protected $traitTemplate = 'admin.traits.vendorsShowBelongs';

    /**
     * @var string
     */
    public function overWriteTemplate()
    {
        return $this->addable ? $this->traitTemplate : '';
    }

    /**
     * @abstract
     * @return string
     */
    abstract public function addFormId(): string;

    /**
     * @abstract
     * @return array[Illuminate\Contracts\Support\Htmlable]
     */
    abstract public function formElements(): array;

    /**
     * @return string
     */
    public function afterTable(): string
    {
        if (! isset($this->addable) || ! $this->addable) {
            return '';
        }
        return <<<AFTR
        <a href="#" data-toggle="modal" data-target="#{$this->addFormId()}" class="btn btn-primary btn-block btn-sm">
            <b>{$this->collectionName}を追加する</b>
        </a>
AFTR;
    }
}
