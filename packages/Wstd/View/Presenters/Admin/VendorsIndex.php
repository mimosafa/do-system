<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Presenters\Admin\Templates\Index;

class VendorsIndex extends Index
{
    /**
     * @var string
     */
    public $id = 'vendors';

    /**
     * @var string
     */
    public $title = '事業者一覧';

    /**
     * @var array
     */
    public $items = [
        'id',
        'name',
        'status',
    ];

    /**
     * @var array
     */
    protected $itemLabels = [
        'id' => 'ID',
        'name' => '事業者名',
        'status' => '登録状況',
    ];

    protected function trClasses($entity): array
    {
        $classes = [];
        $status = $entity->getStatus();
        if (! $status->isRegistered()) {
            $classes[] = 'status_' . $status->getSlug();
        }
        return $classes;
    }

    protected function getName($entity)
    {
        $link = route('admin.vendors.show', ['id' => $entity->getId(),]);
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
}
