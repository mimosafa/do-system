<?php

namespace Wstd\Domain\Services;

use Wstd\Domain\Models\Car\CarsCollection;

interface CarQueryServiceInterface
{
    public function __invoke(?int $vendor_id, ?string $name, ?array $status): CarsCollection;
}
