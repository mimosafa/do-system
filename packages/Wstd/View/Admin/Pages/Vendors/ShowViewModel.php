<?php

namespace Wstd\View\Admin\Pages\Vendors;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\Vendor\Vendor;
use Wstd\View\Admin\Modules\TabContents;

class ShowViewModel extends ViewModel
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
    public $template = 'adminWstd.pages.vendors.show';

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
    }
}
