<?php

namespace Wstd\Application\Usecases\Admin;

use Wstd\Infrastructure\Repositories\ShopRepository;
use Wstd\View\Admin\Pages\Shops\Show;

class ShopShowUsecase
{
    private $repository;

    public function __construct(ShopRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id)
    {
        $shop = $this->repository->getById($id);
        $view = new Show($shop);
        return view($view->template(), $view);
    }
}
