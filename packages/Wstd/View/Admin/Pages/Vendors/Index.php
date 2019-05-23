<?php

namespace Wstd\View\Admin\Pages\Vendors;

use Wstd\Domain\Models\Vendor\VendorCollectionInterface;
use Wstd\View\Admin\ContentInterface;
use Wstd\View\Admin\Includes\AbstractDataTable;

final class Index extends AbstractDataTable implements ContentInterface
{
    public $name = 'vendors';

    public $label = '事業者';

    public $isDataTable = true;

    public $items = [
        'id',
        'name',
        'status',
    ];

    public $itemLabels = [
        'id' => 'ID',
        'name' => '事業者名',
        'status' => '状態',
    ];

    /**
     * @var Wstd\Domain\Models\Vendor\VendorsCollection
     */
    public $collection;

    /**
     * @var string
     */
    protected $template = 'adminWstd.pages.index';

    public function __construct(VendorCollectionInterface $collection)
    {
        $this->collection = $collection;
    }

    public function tdName($entity)
    {
        $link = \route('admin.vendors.show', ['id' => $entity->getId(),]);
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
