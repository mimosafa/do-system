<?php

namespace Wstd\View\Admin\Pages\Vendors;

use Wstd\Domain\Models\Vendor\Vendor;
use Wstd\View\Admin\ContentInterface;
use Wstd\View\Admin\Includes\AbstractDataTable;
use Wstd\View\Admin\Includes\FormItemContainer;
use Wstd\View\Admin\Modules\FormItems\InputText;

final class ShopsTable extends AbstractDataTable implements ContentInterface
{
    /**
     * @var Wstd\Domain\Models\Vendor\Vendor
     */
    private $entity;

    /**
     * @var string
     */
    public $name = 'shops';

    /**
     * @var string
     */
    public $label = '店舗';

    /**
     * @var bool
     */
    public $isDataTable = false;

    /**
     * @var array
     */
    public $items = [
        # 'thumb',
        'name',
        'status',
    ];

    /**
     * @var array
     */
    public $itemLabels = [
        # 'thumb' => '店舗写真',
        'name' => '店舗名',
        'status' => '状態',
    ];

    /**
     * @var Wstd\View\Admin\Contents\FormItemContainer
     */
    public $addShopForm;

    /**
     * Overwrite Wstd\View\Admin\Includes\AbstractDataTable::$template
     *
     * @var string
     */
    protected $template = 'adminWstd.pages.vendors.shopTable';

    public function __construct(Vendor $entity)
    {
        $this->entity = $entity;
        $this->collection = $entity->getShops();
        $this->initAddShopForm();
    }

    protected function initAddShopForm()
    {
        $container = new FormItemContainer();
        $container->add(new InputText('shop[name]', [
            'id' => 'name_of_adding_shop',
            'label' => '店舗名',
        ]));
        $this->addShopForm = $container;
    }

    public function tdThumb($entity)
    {
        $photos = $entity->getPhotos();
        if ($photos->isEmpty()) {
            return '<span class="noImage thumbImage">No Image</span>';
        }
        return sprintf(
            '<a href="#" style="background-image:url(%s)" class="thumbImage"></a>',
            $photos->first()->getUrl('thumb')
        );
    }

    public function tdName($value)
    {
        return sprintf('<a href="%s">%s</a>',
            e(route('admin.shops.show', ['id' => $value->getId()])),
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
        return '<i class="fa fa-coffee"></i> ' . $this->label;
    }

    public function afterTable()
    {
        return <<< AFTER

AFTER;
    }
}
