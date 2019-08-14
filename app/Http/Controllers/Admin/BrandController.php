<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Wstd\Application\Requests\Admin\BrandRequest;
use Wstd\Domain\Models\Brand\BrandValueStatus;
use Wstd\Domain\Services\BrandService;
use Wstd\View\Presenters\Admin\BrandsIndex;
use Wstd\View\Presenters\Admin\BrandsShow;
use Wstd\View\Presenters\Bridge;

class BrandController extends Controller
{
    /**
     * @var Wstd\Domain\Services\BrandService
     */
    private $service;

    /**
     * Constructor
     *
     * @param Wstd\Domain\Services\BrandService $service
     */
    public function __construct(BrandService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'vendor_id' => 'int',
            'name' => 'string',
            'status' => 'array|' . Rule::in(BrandValueStatus::toArray()),
        ]);

        $indexedStatuses = $request->status ?? BrandValueStatus::getIndexableValues();
        $collection = $this->service->find($validated);
        return Bridge::view(new BrandsIndex($collection, compact('indexedStatuses')));
    }

    public function show(int $id)
    {
        $entity = $this->service->find($id);
        return Bridge::view(new BrandsShow($entity));
    }

    public function store(BrandRequest $request)
    {
        $id = $this->service->store($request->all())->getId();
        return redirect()->route('admin.brands.show', compact('id'));
    }

    public function update(int $id, BrandRequest $request)
    {
        $id = $this->service->update($id, $request->all())->getId();
        return redirect()->route('admin.brands.show', compact('id'));
    }
}
