<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Wstd\Application\Requests\Admin\ShopUpdateRequest;
use Wstd\Application\Requests\Admin\ShopsIndexRequest;
use Wstd\Application\Usecases\Admin\ShopUpdateUsecase;

use Wstd\Domain\Services\ShopService;
use Wstd\View\Admin\Pages\Shops\Show;

use Wstd\View\Presenters\Admin\ShopsIndex;
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

    public function index(ShopsIndexRequest $request)
    {
        $collection = $this->service->find($request->all());
        return Bridge::view(new ShopsIndex($collection));
    }

    public function show(int $id)
    {
        $entity = $this->service->find($id);

        $view = new Show($entity);
        return view($view->template(), $view);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vendor_id' => 'required|integer',
            'name' => 'required|string|max:100',
        ]);

        $id = $this->service->store($validated)->getId();
        return redirect()->route('admin.shops.show', compact('id'));
    }

    public function update(int $id, ShopUpdateRequest $request, ShopUpdateUsecase $usecase)
    {
        return $usecase($id, $request);
    }
}
