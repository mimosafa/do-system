<?php

namespace Wstd\Application\Usecases\Admin\Vendors;

use Wstd\Infrastructure\Repositories\VendorRepository;

class UsecaseIndex
{
    protected $repository;

    public function __construct(VendorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $arguments = [
            'list' => $this->repository->list(),
            'datatable' => true,
            'model_name' => 'vendor',
            'model_label' => '事業者',
        ];
        return $arguments;
    }
}
