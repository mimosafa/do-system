<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Wstd\Application\Requests\Admin\ItemRequest;
use Wstd\Domain\Models\Item\ItemValueStatus;
use Wstd\Domain\Services\ItemService;
use Wstd\View\Presenters\Admin\ItemsIndex;
use Wstd\View\Presenters\Admin\ItemsShow;
use Wstd\View\Presenters\Bridge;

class ItemController extends Controller
{
    private $service;

    public function __construct(ItemService $service)
    {
        parent::__construct();
        
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'vendor_id' => 'int',
            'name' => 'string',
            'status' => 'array|' . Rule::in(ItemValueStatus::toArray()),
        ]);

        $indexedStatuses = $request->status ?? ItemValueStatus::getIndexableValues();
        $collection = $this->service->find($validated);
        return Bridge::view(new ItemsIndex($collection, compact('indexedStatuses')));
    }

    public function show(int $id)
    {
        $entity = $this->service->find($id);
        return Bridge::view(new ItemsShow($entity));
    }

    public function store(ItemRequest $request)
    {
        $id = $this->service->store($request->all())->getId();
        return redirect()->route('admin.items.show', compact('id'));
    }

    public function update(int $id, ItemRequest $request)
    {
        $id = $this->service->update($id, $request->all())->getId();
        return redirect()->route('admin.items.show', compact('id'));
    }
}
