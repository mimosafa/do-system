<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Application\Requests\Admin\VendorsIndexRequest;
use Wstd\Application\Usecases\Admin\VendorShowUsecase;
use Wstd\Application\Usecases\Admin\VendorsIndexUsecase;

class VendorController extends Controller
{
    public function index(VendorsIndexRequest $request, VendorsIndexUsecase $usecase)
    {
        return $usecase($request);
    }

    public function show(int $id, VendorShowUsecase $usecase)
    {
        return $usecase($id);
    }

    public function update(int $id)
    {
        //
    }
}
