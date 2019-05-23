<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Application\Requests\Admin\VendorsIndexRequest;
use Wstd\Application\Usecases\Admin\VendorShowUsecase;
use Wstd\Application\Requests\Admin\VendorUpdateRequest;
use Wstd\Application\Usecases\Admin\VendorUpdateUsecase;
use Wstd\Application\Requests\Admin\VendorStoreRequest;
use Wstd\Application\Usecases\Admin\VendorStoreUsecase;

use Wstd\Domain\Services\VendorService;
use Wstd\View\Admin\Pages\Vendors\Index;

class VendorController extends Controller
{
    public function index(VendorsIndexRequest $request, VendorService $service)
    {
        $view = new Index($service->find($request));
        return view($view->template(), $view);
    }

    public function show(int $id, VendorShowUsecase $usecase)
    {
        return $usecase($id);
    }

    public function create()
    {
        return view('adminWstd.pages.vendors.create');
    }

    public function store(VendorStoreRequest $request, VendorStoreUsecase $usecase)
    {
        return $usecase($request);
    }

    public function update(int $id, VendorUpdateRequest $request, VendorUpdateUsecase $usecase)
    {
        return $usecase($id, $request);
    }
}
