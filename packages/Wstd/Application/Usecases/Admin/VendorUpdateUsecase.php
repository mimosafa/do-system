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
        if ($request->editDefaultInformationNow) {
            return $this->editDefaultInformation($id, $request);
        }
        if ($request->addCarToVendorNow) {
            return $this->addCarToVendor($id, $request);
        }
    }

    protected function editDefaultInformation(int $id, Request $request)
    {
        $entity = $this->vendorRepository->init([
            'id' => $id,
            'name' => $request->name,
            'status' => (int) $request->status,
        ]);
        $this->vendorRepository->store($entity);

        return redirect()->route('admin.vendors.show', [
            'id' => $entity->getId(),
        ]);
    }

    protected function addCarToVendor(int $id, Request $request)
    {
        $entity = $this->carRepository->init([
            'vendor_id' => $id,
            'name' => $request->car['name'],
            'vin' => $request->car['vin'],
        ]);
        $this->carRepository->store($entity);

        return redirect()->route('admin.cars.show', [
            'id' => $entity->getId(),
        ]);
    }
}
