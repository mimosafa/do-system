<?php

namespace Wstd\Application\Usecases\Admin;

use Wstd\Infrastructure\Repositories\VendorRepository;
use Wstd\View\Admin\Pages\Vendors\ShowViewModel;

class VendorShowUsecase
{
    private $repository;

    public function __construct(VendorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id)
    {
        $vendor = $this->repository->getById($id);
        $view = new ShowViewModel($vendor);
        return view($view->template(), $view);
    }
}
