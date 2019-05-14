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
        else if ($request->add_image_to_car) {
            return $this->addImageToCar($id, $request);
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

    protected function addImageToCar(int $id, Request $request)
    {
        $eloquent = \Wstd\Infrastructure\Eloquents\Car::find($id);
        $eloquent->addMediaFromRequest('image')->toMediaCollection('cars');

        return redirect()->route('admin.cars.show', [
            'id' => $id,
        ]);
    }
}
