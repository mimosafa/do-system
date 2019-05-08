<?php

namespace Wstd\Application\Usecases\Admin;

use Illuminate\Http\Request;
use Wstd\Domain\Models\Car\CarsCollection;
use Wstd\Infrastructure\Factories\CarFactory;
use Wstd\Infrastructure\Services\CarQueryService;
use Wstd\View\Models\Admin\Pages\Cars\IndexViewModel;

class CarsIndexUsecase
{
    private $servise;

    public function __construct(CarQueryService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $eloquents = ($this->service)($request->vendor_id, $request->name, $request->status);

        $collection = new CarsCollection();
        foreach ($eloquents as $eloquent) {
            $collection[] = CarFactory::makeFromEloquent($eloquent);
        }
        return view('admin/templates/index', new IndexViewModel($collection));
    }
}
