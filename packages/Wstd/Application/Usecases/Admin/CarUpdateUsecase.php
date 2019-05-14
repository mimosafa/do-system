<?php

namespace Wstd\Application\Usecases\Admin;

use Illuminate\Http\Request;
use Wstd\Infrastructure\Repositories\CarRepository;

class CarUpdateUsecase
{
    private $repository;

    public function __construct(CarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id, Request $request)
    {
        if ($request->edit_car_default_information) {
            return $this->editCarDefaultInformation($id, $request);
        }
    }

    protected function editCarDefaultInformation(int $id, Request $request)
    {
        $entity = $this->repository->init([
            'id' => $id,
            'name' => $request->name,
            'vin' => $request->vin,
            'status' => (int) $request->status,
        ]);
        $this->repository->store($entity);

        return redirect()->route('admin.cars.show', [
            'id' => $entity->getId(),
        ]);
    }
}
