<?php

namespace Wstd\View\Admin\Pages\Shops;

use Wstd\Domain\Models\Shop\ShopsCollection;
use Wstd\View\Admin\ContentInterface;
use Wstd\View\Admin\Includes\AbstractDataTable;

final class Index extends AbstractDataTable implements ContentInterface
{
    public $name = 'shops';

    public $label = '店舗';

    public $isDataTable = true;

    public $items = [
        'id',
        # 'thumb',
        'name',
        'status',
    ];

    public $itemLabels = [
        'id' => '事業者ID',
        # 'thumb' => '店舗写真',
        'name' => '事業者名 / 店舗名',
        'status' => '状態',
    ];

    /**
     * @var Wstd\Domain\Models\Shop\ShopsCollection
     */
    public $collection;

    /**
     * @var string
     */
    protected $template = 'adminWstd.pages.index';

    public function __construct(ShopsCollection $collection)
    {
        $this->collection = $collection;
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

    public function tdId($entity)
    {
        return $entity->getVendor()->getId();
    }

    protected function vendor($entity)
    {
        $vendor = $entity->getVendor();
        $link = \route('admin.vendors.show', ['id' => $vendor->getId(),]);
        $status = $vendor->getStatus();
        $string = sprintf('<a href="%s">%s</a>', e($link), e($vendor->getName()));
        if (! $status->isRegistered()) {
            $string = sprintf('<small class="muted">[ %s ]</small> ', $status) . $string;
        }
        return $string;
    }

    public function tdName($entity)
    {
        $link = \route('admin.shops.show', ['id' => $entity->getId(),]);
        $status = $entity->getStatus();
        $string = sprintf('<a href="%s">%s</a>', e($link), e($entity->getName()));
        if (! $status->isRegistered()) {
            $string = sprintf('<small class="muted">[ %s ]</small> ', $status) . $string;
        }
        return $this->vendor($entity) . ' / ' . $string;
    }

    public function tdStatus($entity)
    {
        $status = $entity->getStatus();
        return $status->isRegistered() ? '' : $status;
    }

    public function id(): string
    {
        return 'index_' . $this->name;
    }

    public function title(): string
    {
        return $this->label . '一覧';
    }
}
