<?php

namespace Wstd\Domain\Services;

use Wstd\Domain\Models\Vendor\VendorsCollection;

interface VendorQueryServiceInterface
{
    public function __invoke(?string $name, ?array $status): VendorsCollection;
}
