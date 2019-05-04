<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Application\Requests\Admin\VendorsIndexRequest;
use Wstd\Application\Usecases\Admin\VendorsIndexUsecase;
use Wstd\Infrastructure\Repositories\VendorRepository;

class VendorController extends Controller
{
    public function index(VendorsIndexRequest $request, VendorsIndexUsecase $usecase)
    {
        return $usecase($request);
    }

    public function show(int $id, VendorRepository $repository)
    {
        $vendor = $repository->getById($id);
        return view('admin/pages/vendors/show', [
            'model' => $vendor,
        ]);
    }
}
