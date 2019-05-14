<?php

namespace Wstd\Application\Usecases\Admin;

use Illuminate\Http\Request;
use Wstd\Infrastructure\Services\CarQueryService;
use Wstd\View\Admin\Pages\Cars\Index;

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
        $view = new Index($collection);
        return view($view->template(), $view);
    }
}
