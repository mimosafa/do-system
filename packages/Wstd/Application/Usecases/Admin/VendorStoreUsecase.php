<?php

namespace Wstd\Application\Usecases\Admin;

use Illuminate\Http\Request;
use Wstd\Infrastructure\Repositories\VendorRepository;

class VendorStoreUsecase
{
    private $repository;

    public function __construct(VendorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $vendor = $this->repository->init([
            'name' => $request->name,
        ]);
        $this->repository->store($vendor);

        return redirect()->route('admin.vendors.show', [
            'id' => $vendor->getId(),
        ]);
    }
}
