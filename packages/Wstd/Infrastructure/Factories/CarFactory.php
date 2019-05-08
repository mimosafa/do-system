<?php

namespace Wstd\Infrastructure\Factories;

use Wstd\Domain\Models\Car\Car;
use Wstd\Domain\Models\Car\CarValueVin;
use Wstd\Domain\Models\Car\CarValueStatus;
use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Infrastructure\Eloquents\Car as Eloquent;
use Wstd\Infrastructure\Eloquents\Vendor as VendorEloquent;
use Wstd\Infrastructure\Repositories\VendorRepository;

class CarFactory
{
    /**
     * @var Wstd\Infrastructure\Repositories\VendorRepository
     */
    private static $vendorRepository;

    /**
     * @param array{id:?int,vendor:mixed,name:string,vin:mixed,status:?mixed} $param
     * @return Wstd\Domain\Models\Car\CarInterface
     */
    public static function make(array $params): Car
    {
        $id = $params['id'] ?? null;
        if (isset($params['vendor'])) {
            $vendor = $params['vendor'];
            if (! ($vendor instanceof VendorInterface)) {
                throw new \Exception('\'vendor\' parameter must be instanceof \'Wstd\\Domain\\Models\\Vendor\\VendorInterface\'.');
            }
        }
        else if (isset($params['vendor_id'])) {
            $vendorId = $params['vendor_id'];
            if (! is_int($vendorId)) {
                throw new \Exception('\'vendor_id\' parameter must be int.');
            }
            /** Singleton property */
            $vendorRepo = self::$vendorRepository ?? self::$vendorRepository = new VendorRepository();
            if (! $vendor = $vendorRepo->getById($vendorId)) {
                throw new \Exception('Invalid \'vendor_id\' value.');
            }
        }
        else {
            /** @todo */
        }
        $name = $params['name'];
        $vin = CarValueVin::of($params['vin']);
        $status = isset($params['status']) ? CarValueStatus::of($params['status']) : null;

        return new Car($id, $vendor, $name, $vin, $status);
    }

    /**
     * @param Wstd\Infrastructure\Eloquents\Car $eloquent
     * @return Wstd\Domain\Models\Car\Car
     */
    public static function makeFromEloquent(Eloquent $eloquent): Car
    {
        return self::make([
            'id' => $eloquent->id,
            'vendor_id' => $eloquent->vendor->id,
            'name' => $eloquent->name,
            'vin' => $eloquent->vin,
            'status' => $eloquent->status
        ]);
    }

    /**
     * @param Wstd\Domain\Models\Car\CarInterface
     * @return array{id:?int,vendor:Wstd\Domain\Models\Vendor\Vendor,name:string,vin:string,status:?int}
     */
    public static function break(Car $car): array
    {
        $id = $car->getId();
        $vendor = $car->getVendor();
        $name = $car->getName();
        $vin = $car->getVin();
        $status = $car->getStatus();

        $array = [];
        if (isset($id)) {
            $array['id'] = $id;
        }
        $array['vendor_id'] = $vendor->getId();
        $array['name'] = $name;
        $array['vin'] = $vin->getValue();
        if (isset($status)) {
            $array['status'] = $status->getValue();
        }
        return $array;
    }
}
