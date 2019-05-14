<?php

namespace Wstd\View\Admin\Pages\Vendors;

use Wstd\Domain\Models\Vendor\Vendor;
use Wstd\View\Admin\ContentInterface;
use Wstd\View\Admin\Includes\AbstractDataTable;
use Wstd\View\Admin\Includes\FormItemContainer;
use Wstd\View\Admin\Modules\FormItems\InputText;

final class CarsTable extends AbstractDataTable implements ContentInterface
{
    /**
     * @var Wstd\Domain\Models\Vendor\Vendor
     */
    private $entity;

    /**
     * @var string
     */
    public $name = 'cars';

    /**
     * @var string
     */
    public $label = '車両';

    /**
     * @var bool
     */
    public $isDataTable = false;

    /**
     * @var array
     */
    public $items = [
        'name',
        'vin',
        'status',
    ];

    /**
     * @var array
     */
    public $itemLabels = [
        'name' => '車両名',
        'vin' => '車両No',
        'status' => '状態',
    ];

    /**
     * @var Wstd\View\Admin\Contents\FormItemContainer
     */
    public $addCarForm;

    /**
     * Overwrite Wstd\View\Admin\Includes\AbstractDataTable::$template
     *
     * @var string
     */
    protected $template = 'adminWstd.pages.vendors.carTable';

    public function __construct(Vendor $entity)
    {
        $this->entity = $entity;
        $this->collection = $entity->getCars();
        $this->initAddCarForm();
    }

    protected function initAddCarForm()
    {
        $container = new FormItemContainer();
        $container->add(new InputText('car[name]', [
            'id' => 'name_of_adding_car',
            'label' => '車両名',
        ]));
        $container->add(new InputText('car[vin]', [
            'id' => 'vin_of_adding_car',
            'label' => '車両No',
        ]));
        $this->addCarForm = $container;
    }

    public function tdName($value)
    {
        return sprintf('<a href="%s">%s</a>',
            e(route('admin.cars.show', ['id' => $value->getId()])),
            e($value->getName())
        );
    }

    public function tdStatus($value)
    {
        return e($value->getStatus());
    }

    public function tdVin($value)
    {
        return e($value->getVin());
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return 'vendor_' . $this->name;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return '<i class="fa fa-car"></i> ' . $this->label;
    }

    public function afterTable()
    {
        return <<< AFTER

AFTER;
    }
}
