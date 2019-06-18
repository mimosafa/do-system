<?php

namespace Wstd\View\Presenters\Admin\Templates;

use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Admin\Modules\Content;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;
use Wstd\View\Presenters\Admin\Modules\FormContainer;

class Belongs extends Content
{
    /**
     * @var string
     */
    public $id;
    public $title;

    /**
     * @var Wstd\View\Presenters\Admin\Modules\EntitiesTable
     */
    public $content;

    /**
     * @var bool
     */
    public $exchangable = false;

    /**
     * @var string
     */
    protected $exchangeText;

    /**
     * @var Wstd\View\Presenters\Admin\Modules\FormContainer|null
     */
    public $exchangeForm;

    /**
     * @var bool
     */
    public $sortable = false;

    /**
     * @var array[int]
     */
    protected $beforeSort;

    /**
     * @var string
     */
    protected $nameForSort;

    /**
     * @var string
     */
    protected $sortText;

    /**
     * Default Blade template
     *
     * @var string
     */
    public $template = 'admin.templates.belongs';

    public function __construct(EntitiesTable $entitiesTable, array $args = [])
    {
        $this->content = $entitiesTable;
        $this->parseArguments($args);
    }

    public function sortState()
    {
        if (! isset($this->beforeSort) || ! is_array($this->beforeSort)) {
            throw new \Exception();
        }
        if (! isset($this->nameForSort) || ! is_string($this->nameForSort)) {
            throw new \Exception();
        }
        $value = implode(',', $this->beforeSort);

        return FormFactory::makeInputHidden([
            'data-name' => e($this->nameForSort),
            'data-order' => $value,
            'value' => $value,
            'class' => 'sort-state',
        ]);
    }

    public function toggleOrSubmit()
    {
        $params = [
            'type' => 'button',
            'class' => 'btn-primary btn-block btn-sm',
        ];

        if (isset($this->exchangeForm) && is_object($this->exchangeForm) && ($this->exchangeForm instanceof FormContainer)) {
            $params['data-toggle'] = 'modal';
            $params['data-target'] = '#' . e($this->exchangeForm->id);

            $exchangeText = $this->exchangeText ?? 'Exchange';
            $params['data-exchangetext'] = e($exchangeText);
        }

        if (filter_var($this->sortable, \FILTER_VALIDATE_BOOLEAN)) {
            $sortText = $this->sortText ?? 'Submit sort result';
            $params['data-sorttext'] = e($sortText);
        }

        $button = FormFactory::makeButton($params)->class('toggle-or-submit');

        return $button->html('<b>' . $params['data-exchangetext'] . '</b>');
    }
}
