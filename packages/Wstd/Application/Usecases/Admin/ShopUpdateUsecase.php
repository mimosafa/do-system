<?php

namespace Wstd\Application\Usecases\Admin;

use Illuminate\Http\Request;
use Wstd\Infrastructure\Repositories\ShopRepository;

class ShopUpdateUsecase
{
    private $repository;

    public function __construct(ShopRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id, Request $request)
    {
        $params = ['id' => $id];
        if (isset($request->name)) {
            $params['name'] = $request->name;
        }
        if (isset($request->status)) {
            $params['status'] = (int) $request->status;
        }
        $entity = $this->repository->store($params);

        return redirect()->route('admin.shops.show', [
            'id' => $entity->getId(),
        ]);
    }
}
