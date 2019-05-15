<?php

namespace Wstd\Application\Usecases\Admin;

use Illuminate\Http\Request;
use Wstd\Infrastructure\Repositories\CarRepository;
use Wstd\Infrastructure\Repositories\VendorRepository;

class VendorUpdateUsecase
{
    private $vendorRepository;
    private $carRepository;

    public function __construct(VendorRepository $vendorRepository, CarRepository $carRepository)
    {
        $this->vendorRepository = $vendorRepository;
        $this->carRepository = $carRepository;
    }

    public function __invoke(int $id, Request $request)
    {
        if ($request->add_car_to_vendor) {
            return $this->addCarToVendor($id, $request);
        }

        $params = ['id' => $id];
        if (isset($request->name)) {
            $params['name'] = $request->name;
        }
        if (isset($request->status)) {
            $params['status'] = (int) $request->status;
        }
        $entity = $this->vendorRepository->store($params);

        return redirect()->route('admin.vendors.show', [
            'id' => $entity->getId(),
        ]);
    }

    protected function addCarToVendor(int $id, Request $request)
    {
        $entity = $this->carRepository->store([
            'vendor_id' => $id,
            'name' => $request->car['name'],
            'vin' => $request->car['vin'],
        ]);

        return redirect()->route('admin.cars.show', [
            'id' => $entity->getId(),
        ]);
    }
}
