<?php

namespace Wstd\Application\Usecases\Admin;

use Wstd\Infrastructure\Repositories\CarRepository;
# use Wstd\View\Models\Admin\Pages\Cars\ShowViewModel;
use Wstd\View\Admin\Pages\Cars\ShowViewModel;

class CarShowUsecase
{
    private $repository;

    public function __construct(CarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id)
    {
        $car = $this->repository->getById($id);
        $view = new ShowViewModel($car);
        return view($view->template(), $view);
    }
}
