<?php

namespace Wstd\Application\Usecases\Admin;

use Wstd\Infrastructure\Repositories\CarRepository;
use Wstd\View\Admin\Pages\Cars\Show;

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
        $view = new Show($car);
        return view($view->template(), $view);
    }
}
