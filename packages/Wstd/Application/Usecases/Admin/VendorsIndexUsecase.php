<?php

namespace Wstd\Application\Usecases\Admin;

use Illuminate\Http\Request;
use Wstd\Domain\Models\Vendor\VendorsCollection;
use Wstd\Infrastructure\Factories\VendorFactory;
use Wstd\Infrastructure\Services\VendorQueryService;
use Wstd\View\Models\Admin\Pages\VendorsIndexViewModel;

class VendorsIndexUsecase
{
    private $servise;

    public function __construct(VendorQueryService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $eloquents = ($this->service)($request->name, $request->status);

        $collection = new VendorsCollection();
        foreach ($eloquents as $eloquent) {
            $collection[] = VendorFactory::makeFromEloquent($eloquent);
        }
        return view('admin/templates/index', new VendorsIndexViewModel($collection));
    }
}
