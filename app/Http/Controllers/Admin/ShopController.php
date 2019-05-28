<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Wstd\Application\Requests\Admin\ShopUpdateRequest;
use Wstd\Application\Requests\Admin\ShopsIndexRequest;
use Wstd\Application\Usecases\Admin\ShopUpdateUsecase;

use Wstd\Domain\Models\Shop\ShopRepositoryInterface;
use Wstd\Domain\Services\ShopService;
use Wstd\View\Admin\Pages\Shops\Index;
use Wstd\View\Admin\Pages\Shops\Show;

use Wstd\View\Presenters\Bridge;
use Wstd\View\Presenters\Admin\ShopsIndex;

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

    public function update(int $id, ShopUpdateRequest $request, ShopUpdateUsecase $usecase)
    {
        return $usecase($id, $request);
    }
}
