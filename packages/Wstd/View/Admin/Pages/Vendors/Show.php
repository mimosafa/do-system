<?php

namespace Wstd\View\Admin\Pages\Vendors;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\Vendor\Vendor;
use Wstd\View\Admin\ViewModelInterface;
use Wstd\View\Admin\Modules\TabContents;

final class Show extends ViewModel implements ViewModelInterface
{
    /**
     * @var Wstd\Domain\Models\Vendor\Vendor
     */
    protected $entity;

    /**
     * @var string
     */
    public $title = '事業者詳細';

    /**
     * @var string Blade template
     */
    private $template = 'adminWstd.pages.vendors.show';

    /**
     * @var Wstd\View\Admin\Pages\Vendors\DefaultInformation
     */
    public $defaultInformation;

    /**
     * @var Wstd\View\Admin\Modules\TabContents
     */
    public $objectsBelonged;

    /**
     * @var array
     */
    protected $ignore = ['template', '__construct'];

    public function __construct(Vendor $entity)
    {
        $this->entity = $entity;
        $this->defaultInformation = new DefaultInformation($entity);
        $this->initObjectsBelonged();
    }

    protected function initObjectsBelonged()
    {
        $this->objectsBelonged = new TabContents('belongs_to_vendor');
        $this->objectsBelonged->add(new CarsTable($this->entity));
        $this->objectsBelonged->add(new ShopsTable($this->entity));
    }

    public function template(): string
    {
        return $this->template;
    }
}
