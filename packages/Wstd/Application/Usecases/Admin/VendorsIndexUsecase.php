<?php

namespace Wstd\Application\Usecases\Admin;

use Illuminate\Http\Request;
use Wstd\Infrastructure\Services\VendorQueryService;
use Wstd\View\Admin\Pages\Vendors\Index;

class VendorsIndexUsecase
{
    private $servise;

    public function __construct(VendorQueryService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $collection = ($this->service)($request->name, $request->status);
        $view = new Index($collection);
        return view($view->template(), $view);
    }
}
