<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Wstd\Application\Requests\Admin\ShopRequest;
use Wstd\Domain\Models\Shop\ShopValueStatus;
use Wstd\Domain\Services\ShopService;
use Wstd\View\Presenters\Admin\ShopsIndex;
use Wstd\View\Presenters\Admin\ShopsShow;
use Wstd\View\Presenters\Bridge;

class ShopController extends Controller
{
    /**
     * @var Wstd\Domain\Services\ShopService
     */
    private $service;

    /**
     * Constructor
     *
     * @param Wstd\Domain\Services\ShopService $service
     */
    public function __construct(ShopService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'vendor_id' => 'int',
            'name' => 'string',
            'status' => 'array|' . Rule::in(ShopValueStatus::toArray()),
        ]);

        $collection = $this->service->find($request->all());
        return Bridge::view(new ShopsIndex($collection));
    }

    public function show(int $id)
    {
        $entity = $this->service->find($id);
        return Bridge::view(new ShopsShow($entity));
    }

    public function store(ShopRequest $request)
    {
        $validated = $request->validate([
            'vendor_id' => 'required|integer',
            'name' => 'required|string|max:100',
        ]);

        $id = $this->service->store($validated)->getId();
        return redirect()->route('admin.shops.show', compact('id'));
    }

    public function update(int $id, ShopRequest $request)
    {
        $id = $this->service->update($id, $request->all())->getId();
        return redirect()->route('admin.shops.show', compact('id'));
    }
}
