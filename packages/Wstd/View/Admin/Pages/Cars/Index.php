<?php

namespace Wstd\View\Admin\Pages\Cars;

use Wstd\Domain\Models\Car\CarsCollection;
use Wstd\View\Admin\ContentInterface;
use Wstd\View\Admin\Includes\AbstractDataTable;

final class Index extends AbstractDataTable implements ContentInterface
{
    public $name = 'cars';

    public $label = '車両';

    public $isDataTable = true;

    public $items = [
        'id',
        'vendor',
        'name',
        'vin',
        'status',
    ];

    public $itemLabels = [
        'id' => '事業者ID',
        'vendor' => '事業者',
        'name' => '車両名',
        'status' => '状態',
    ];

    /**
     * @var Wstd\Domain\Models\Car\CarsCollection
     */
    public $collection;

    /**
     * @var string
     */
    protected $template = 'adminWstd.pages.index';

    public function __construct(CarsCollection $collection)
    {
        $this->collection = $collection;
    }

    public function tdId($entity)
    {
        return $entity->getVendor()->getId();
    }

    public function tdVendor($entity)
    {
        $vendor = $entity->getVendor();
        return $vendor->getName();
    }

    public function tdName($entity)
    {
        $link = \route('admin.cars.show', ['id' => $entity->getId(),]);
        $status = $entity->getStatus();
        $string = sprintf('<a href="%s">%s</a>', e($link), e($entity->getName()));
        if (! $status->isRegistered()) {
            $string = sprintf('<small class="muted">[ %s ]</small> ', $status) . $string;
        }
        return $string;
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
