<?php

namespace Wstd\Domain\Models\BusinessPermit;

use Carbon\Carbon;
use Wstd\Domain\Models\BelongsToVendorInterface;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\BusinessArea\BusinessAreaInterface;
use Wstd\Domain\Models\Car\Car;
use Wstd\Domain\Models\HealthCenter\HealthCenter;
use Wstd\Domain\Models\HealthCenter\HealthCenterInterface;
use Wstd\Domain\Models\HealthCenter\HealthCenterRepositoryInterface;
use Wstd\Domain\Models\Vendor\VendorInterface;
use Wstd\Infrastructure\Eloquents\BusinessPermit as Eloquent;
use Wstd\Infrastructure\Eloquents\Car as CarEloquent;

final class BusinessPermit implements BusinessPermitInterface
{
    private $eloquent;
    private $approved;

    public function __construct(int $id)
    {
        $this->eloquent = Eloquent::findOrFail($id);
    }

    public function getId(): int
    {
        return $this->eloquent->id;
    }

    public function getApproved(): EntityInterface
    {
        if ($this->approved) {
            return $this->approved;
        }

        $approvedEloquent = $this->eloquent->approved;

        if ($approvedEloquent instanceof CarEloquent) {
            return $this->approved = new Car($approvedEloquent->id);
        }

        throw new \Exception();
    }

    public function getApprovedType(): BusinessPermitValueApprovedType
    {
        $approved = $this->getApproved();

        return BusinessPermitValueApprovedType::of($approved);
    }

    public function getVendor(): VendorInterface
    {
        $approved = $this->getApproved();

        if ($approved instanceof BelongsToVendorInterface) {
            return $approved->getVendor();
        }

        /** @todo */
    }

    public function getHealthCenter(): HealthCenterInterface
    {
        $repository = resolve(HealthCenterRepositoryInterface::class);

        return $repository->findById($this->eloquent->health_center_id);
    }

    public function getBusinessArea(): BusinessAreaInterface
    {
        $healthCenter = $this->getHealthCenter();

        return $healthCenter->getBusinessArea();
    }

    public function getBusinessCategory(): BusinessPermitValueBusinessCategory
    {
        return BusinessPermitValueBusinessCategory::of($this->eloquent->business_category);
    }

    public function getEndDate(): Carbon
    {
        return new Carbon($this->eloquent->end_date);
    }
}
