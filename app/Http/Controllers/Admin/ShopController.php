<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Application\Requests\Admin\ShopUpdateRequest;
use Wstd\Application\Requests\Admin\ShopsIndexRequest;
use Wstd\Application\Usecases\Admin\ShopShowUsecase;
use Wstd\Application\Usecases\Admin\ShopUpdateUsecase;
use Wstd\Application\Usecases\Admin\ShopsIndexUsecase;

class ShopController extends Controller
{
    public function index(ShopsIndexRequest $request, ShopsIndexUsecase $usecase)
    {
        return $usecase($request);
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
