<?php

namespace Wstd\Application\Usecases\Admin;

use Illuminate\Http\Request;
use Wstd\Infrastructure\Services\ShopQueryService;
use Wstd\View\Admin\Pages\Shops\Index;

class ShopsIndexUsecase
{
    private $servise;

    public function __construct(ShopQueryService $service)
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
