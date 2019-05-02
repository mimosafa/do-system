<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Application\Requests\Admin\VendorsListRequest;
use Wstd\Application\Usecases\Admin\VendorsIndexUsecase;

class VendorController extends Controller
{
    public function index(VendorsListRequest $request, VendorsIndexUsecase $usecase)
    {
        return $usecase($request);
    }
}
