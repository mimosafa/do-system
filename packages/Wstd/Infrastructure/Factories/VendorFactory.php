<?php

namespace Wstd\Infrastructure\Factories;

use Wstd\Domain\Vendor\VendorModel;
use Wstd\Domain\Vendor\VendorValueStatus;
use Wstd\Infrastructure\Eloquents\Vendor;

class VendorFactory
{
    public static function make(array $params): VendorModel
    {
        return new VendorModel(
            isset($params['id']) ? $params['id'] : null,
            $params['name'],
            isset($params['id']) ? VendorValueStatus::of($params['id']) : null
        );
    }

    public static function makeFromEloquent(Vendor $eloquent): VendorModel
    {
        return new VendorModel(
            $eloquent->id,
            $eloquent->name,
            VendorValueStatus::of($eloquent->status)
        );
    }

    public static function break(VendorModel $vendor): array
    {
        $id = $vendor->getId();
        $name = $vendor->getName();
        $status = $vendor->getStatus();

        $array = [];
        if (isset($id)) {
            $array['id'] = $id;
        }
        if (isset($name)) {
            $array['name'] = $name;
        }
        if (isset($status)) {
            $array['status'] = $status->getValue();
        }
        return $array;
    }
}
