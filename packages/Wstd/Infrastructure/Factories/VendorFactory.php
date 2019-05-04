<?php

namespace Wstd\Infrastructure\Factories;

use Wstd\Domain\Models\Vendor\Vendor;
use Wstd\Domain\Models\Vendor\VendorValueStatus;
use Wstd\Infrastructure\Eloquents\Vendor as Eloquent;

class VendorFactory
{
    /**
     * @param array{id:?int,name:string,status:?int}
     * @return Wstd\Domain\Models\Vendor\Vendor
     */
    public static function make(array $params): Vendor
    {
        return new Vendor(
            isset($params['id']) ? $params['id'] : null,
            isset($params['name']) ? $params['name'] : null,
            isset($params['status']) ? VendorValueStatus::of($params['status']) : null
        );
    }

    /**
     * @param Wstd\Infrastructure\Eloquents\Vendor $eloquent
     * @return Wstd\Domain\Models\Vendor\Vendor
     */
    public static function makeFromEloquent(Eloquent $eloquent): Vendor
    {
        return new Vendor(
            $eloquent->id,
            $eloquent->name,
            VendorValueStatus::of($eloquent->status)
        );
    }

    /**
     * @param Wstd\Domain\Models\Vendor\Vendor $vendor
     * @return array{id:?int,name:string,status:?int}
     */
    public static function break(Vendor $vendor): array
    {
        $id = $vendor->getId();
        $name = $vendor->getName();
        $status = $vendor->getStatus();

        $array = [];
        if (isset($id)) {
            $array['id'] = $id;
        }
        $array['name'] = $name;
        if (isset($status)) {
            $array['status'] = $status->getValue();
        }
        return $array;
    }
}
