<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Application\Requests\Admin\ShopUpdateRequest;
use Wstd\Application\Requests\Admin\ShopsIndexRequest;
use Wstd\Application\Usecases\Admin\ShopShowUsecase;
use Wstd\Application\Usecases\Admin\ShopUpdateUsecase;

use Wstd\Domain\Services\ShopService;
use Wstd\View\Admin\Pages\Shops\Index;

class ShopController extends Controller
{
    public function index(ShopsIndexRequest $request, ShopService $service)
    {
        $view = new Index($service->find($request));
        return view($view->template(), $view);
    }

    public function show(int $id, ShopShowUsecase $usecase)
    {
        return $usecase($id);
    }

    public function update(int $id, ShopUpdateRequest $request, ShopUpdateUsecase $usecase)
    {
        return $usecase($id, $request);
    }
}
