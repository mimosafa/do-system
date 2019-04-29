<?php

namespace Wstd\View\Models\Admin\Pages\Vendors;

use Illuminate\Support\Collection;
use Wstd\Equipment\View\Models\Admin\AbstractIndexViewModel;
use Wstd\Infrastructure\Repositories\VendorRepository;

class IndexViewModel extends AbstractIndexViewModel
{
    protected $repository;

    public $nameOfIndexed  = 'vendors';
    public $labelOfIndexed = '事業者';

    public $isDataTable = true;

    public $itemsOfIndexed = [
        'id',
        'name',
    ];
    public $itemLabelsOfIndexed = [
        'id' => 'ID',
        'name' => '事業者名',
    ];

    public function __construct(VendorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(): Collection
    {
        return $this->repository->list();
    }

    public function idItemCallback($model)
    {
        return $model->getId();
    }

    public function nameItemCallback($model)
    {
        $name = $model->getName();
        $link = '#';
        $status = $model->getStatus();
        $prepend = $status->isRegistered() ? '' : ' <small>[ ' . $status->getLabel() . ' ]</small>';
        return '<a href="' . $link . '">' . $name . '</a>' . $prepend;
    }

    protected function thClassesCallback(string $item): array
    {
        return [
            'th-' . $item,
        ];
    }

    protected function trClassesCallback($model): array
    {
        return [
            'tr-status-' . $model->getStatus()->getSlug(),
        ];
    }

    protected function tdClassesCallback(string $item, $model): array
    {
        return [
            'td-' . $item,
        ];
    }
}
