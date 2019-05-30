<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Wstd\Application\Requests\Admin\VendorsIndexRequest;
use Wstd\Application\Requests\Admin\VendorUpdateRequest;
use Wstd\Application\Usecases\Admin\VendorUpdateUsecase;

use Wstd\Domain\Services\VendorService;
use Wstd\View\Presenters\Admin\VendorsIndex;
use Wstd\View\Presenters\Admin\VendorsShow;
use Wstd\View\Presenters\Bridge;

class VendorController extends Controller
{
    /**
     * @var Wstd\Domain\Services\VendorService
     */
    private $service;

    /**
     * Constructor
     *
     * @param Wstd\Domain\Services\VendorService $service
     */
    public function __construct(VendorService $service)
    {
        $this->service = $service;
    }

    public function index(VendorsIndexRequest $request)
    {
        $collection = $this->service->find($request->all());
        return Bridge::view(new VendorsIndex($collection));
    }

    public function show(int $id)
    {
        $entity = $this->service->find($id);
        return Bridge::view(new VendorsShow($entity));
    }

    public function create()
    {
        return view('admin.vendorsCreate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $id = $this->service->store($validated)->getId();
        return redirect()->route('admin.vendors.show', compact('id'));
    }

    public function update(int $id, VendorUpdateRequest $request, VendorUpdateUsecase $usecase)
    {
        return $usecase($id, $request);
    }
}
