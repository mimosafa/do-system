<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\Admin\Modules\HiddenForm;
use Wstd\View\Presenters\Admin\Templates\Index;
use Wstd\View\Presenters\Admin\Traits\VendorsShowBelongs;

class ShopsIndex extends Index
{
    use VendorsShowBelongs;

    /**
     * @var string
     */
    public $id = 'shops';

    public $collectionName = '店舗';

    /**
     * @var string
     */
    public $title = '店舗一覧';

    /**
     * @var array
     */
    public $items = [
        'vendor_id', 'vendor', 'name', 'status',
    ];

    /**
     * @var array
     */
    protected $itemLabels = [
        'vendor_id' => '事業者ID',
    ];

    /**
     * route('admin.shops.store')
     */
    protected $action;

    /**
     * @param Wstd\Domain\Models\Shop\ShopCollection
     * @param array $args
     */
    public function __construct($collection, array $args = [])
    {
        parent::__construct($collection, $args);
        $this->action = route('admin.shops.store');
    }

    /**
     * @see Wstd\View\Presenters\Admin\Traits\VendorsShowBelongs
     */
    public function formElements()
    {
        $formItems = [
            FormFactory::makeInputText([
                'name' => 'name',
                'label' => '店舗名',
            ]),
            FormFactory::makeInputHidden([
                'name' => 'vendor_id',
                'value' => $this->vendor_id,
            ]),
        ];

        return $formItems;
    }

    protected function trClasses($entity): array
    {
        $classes = [];
        $status = $entity->getStatus();
        if (! $status->isRegistered()) {
            $classes[] = 'status_' . $status->getSlug();
        }
        return $classes;
    }

    protected function getVendorId($entity)
    {
        return e($entity->getVendor()->getId());
    }

    protected function getVendor($entity)
    {
        $vendor = $entity->getVendor();
        $link = route('admin.vendors.show', ['id' => $vendor->getId(),]);
        $status = $vendor->getStatus();
        $string = sprintf('<a href="%s">%s</a>', e($link), e($vendor->getName()));
        if (! $status->isRegistered()) {
            $string = sprintf('<small class="muted">[ %s ]</small> ', e(strval($status))) . $string;
        }
        return $string;
    }

    protected function getName($entity)
    {
        $link = route('admin.shops.show', ['id' => $entity->getId(),]);
        $status = $entity->getStatus();
        $string = sprintf('<a href="%s">%s</a>', e($link), e($entity->getName()));
        if (! $status->isRegistered()) {
            $string = sprintf('<small class="muted">[ %s ]</small> ', e(strval($status))) . $string;
        }
        return $string;
    }

    protected function getStatus($entity)
    {
        $status = $entity->getStatus();
        return $status->isRegistered() ? '' : e(strval($status));
    }

    public function emptyMessage(): string
    {
        return '店舗の登録がありません';
    }
}
