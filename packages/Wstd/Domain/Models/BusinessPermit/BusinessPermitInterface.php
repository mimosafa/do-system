<?php

namespace Wstd\Domain\Models\BusinessPermit;

use Carbon\Carbon;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\BusinessArea\BusinessAreaInterface;
use Wstd\Domain\Models\HealthCenter\HealthCenterInterface;
use Wstd\Domain\Models\Vendor\VendorInterface;

interface BusinessPermitInterface extends EntityInterface
{
    public function getApproved(): EntityInterface;
    public function getApprovedType(): BusinessPermitValueApprovedType;
    public function getVendor(): VendorInterface;
    public function getHealthCenter(): HealthCenterInterface;
    public function getBusinessArea(): BusinessAreaInterface;
    public function getBusinessCategory(): BusinessPermitValueBusinessCategory;
    public function getStartDate(): BusinessPermitValueStartDate;
    public function getEndDate(): BusinessPermitValueEndDate;
}
