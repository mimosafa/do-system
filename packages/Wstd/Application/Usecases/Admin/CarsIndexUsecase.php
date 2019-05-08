<?php

namespace Wstd\Application\Usecases\Admin;

use Illuminate\Http\Request;
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
        $collection = ($this->service)($request->vendor_id, $request->name, $request->status);
        return view('admin/templates/index', new IndexViewModel($collection));
    }
}
