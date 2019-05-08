<?php

namespace Wstd\Application\Usecases\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Wstd\Infrastructure\Repositories\CarRepository;

class CarUpdateUsecase
{
    private $repository;

    public function __construct(CarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id, $request)
    {
        $params = ['id' => $id,];
        if ($name = $request->name) {
            $params['name'] = $name;
        }
        if ($vin = $request->vin) {
            $params['vin'] = $vin;
        }
        if ($status = $request->status) {
            $params['status'] = (int) $status;
        }
        $entity = $this->repository->init($params);
        $this->repository->store($entity);

        return redirect()->route('admin.cars.show', [
            'id' => $entity->getId(),
        ]);
    }
}
