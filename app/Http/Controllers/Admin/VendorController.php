<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Wstd\Application\Requests\Admin\VendorRequest;
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

    public function index(Request $request)
    {
        $validated = $request->validate([
            'name' => 'string',
            'status' => 'array',
        ]);

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

    public function store(VendorRequest $request)
    {
        $id = $this->service->store($request->all())->getId();
        return redirect()->route('admin.vendors.show', compact('id'));
    }

    public function update(int $id, VendorRequest $request)
    {
        $id = $this->service->update($id, $request->all())->getId();
        return redirect()->route('admin.vendors.show', compact('id'));
    }
}
