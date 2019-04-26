<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Infrastructure\Repositories\VendorRepository;

class VendorController extends Controller
{
    /**
     * @param VendorRepository $repository
     */
    public function index(VendorRepository $repository)
    {
        return view('admin/vendors/index', [
            'list' => $repository->list(),
            'model_name' => 'vendor',
            'model_label' => '事業者',
            'datatable' => true,
        ]);
    }
}
