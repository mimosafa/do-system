<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Wstd\Application\Requests\Admin\ShopUpdateRequest;
use Wstd\Application\Requests\Admin\ShopsIndexRequest;
use Wstd\Application\Usecases\Admin\ShopUpdateUsecase;

use Wstd\Domain\Models\Shop\ShopRepositoryInterface;
use Wstd\Domain\Services\ShopService;
use Wstd\View\Admin\Pages\Shops\Show;

use Wstd\View\Presenters\Admin\ShopsIndex;
use Wstd\View\Presenters\Bridge;

class ShopController extends Controller
{
    public function index(ShopsIndexRequest $request, ShopService $service)
    {
        $collection = $service->find($request->all());
        return Bridge::view(new ShopsIndex($collection));
    }

    public function show(int $id, ShopRepositoryInterface $repository)
    {
        $entity = $repository->findById($id);
        $view = new Show($entity);
        return view($view->template(), $view);
    }

    public function store(Request $request, ShopService $service)
    {
        $validated = $request->validate([
            'vendor_id' => 'required|integer',
            'name' => 'required|string|max:100',
        ]);

        $id = $service->store($validated)->getId();
        return redirect()->route('admin.shops.show', compact('id'));
    }

    public function update(int $id, ShopUpdateRequest $request, ShopUpdateUsecase $usecase)
    {
        return $usecase($id, $request);
    }
}
