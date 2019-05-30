<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Wstd\Application\Requests\Admin\VendorsIndexRequest;
use Wstd\Application\Requests\Admin\VendorUpdateRequest;
use Wstd\Application\Usecases\Admin\VendorUpdateUsecase;
use Wstd\Application\Requests\Admin\VendorStoreRequest;

use Wstd\Domain\Models\Vendor\VendorRepositoryInterface;
use Wstd\Domain\Services\VendorService;
use Wstd\View\Admin\Pages\Vendors\Index;
use Wstd\View\Admin\Pages\Vendors\Show;

use Wstd\View\Presenters\Bridge;
use Wstd\View\Presenters\Admin\VendorsIndex;
use Wstd\View\Presenters\Admin\VendorsShow;

class VendorController extends Controller
{
    public function index(VendorsIndexRequest $request, VendorService $service)
    {
        $collection = $service->find($request->all());
        return Bridge::view(new VendorsIndex($collection));
    }

    public function show(int $id, VendorRepositoryInterface $repository)
    {
        $entity = $repository->findById($id);
        return Bridge::view(new VendorsShow($entity));
        /*
        $entity = $repository->findById($id);
        $view = new Show($entity);

        return view($view->template(), $view);
        */
    }

    public function create()
    {
        return view('admin.vendorsCreate');
    }

    public function store(VendorStoreRequest $request, VendorRepositoryInterface $repository)
    {
        $id = $repository->store($request->all())->getId();

        return redirect()->route('admin.vendors.show', compact('id'));
    }

    public function update(int $id, VendorUpdateRequest $request, VendorUpdateUsecase $usecase)
    {
        return $usecase($id, $request);
    }
}
