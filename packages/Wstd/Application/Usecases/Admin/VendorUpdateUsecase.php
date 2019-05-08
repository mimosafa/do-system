<?php

namespace Wstd\Application\Usecases\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Wstd\Infrastructure\Repositories\VendorRepository;

class VendorUpdateUsecase
{
    private $repository;

    public function __construct(VendorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id, $request)
    {
        $params = ['id' => $id,];
        if ($name = $request->name) {
            $params['name'] = $name;
        }
        if (isset($request->status)) {
            $params['status'] = (int) $request->status;
        }
        $entity = $this->repository->init($params);
        $this->repository->store($entity);

        return redirect()->route('admin.vendors.show', [
            'id' => $entity->getId(),
        ]);
    }
}
