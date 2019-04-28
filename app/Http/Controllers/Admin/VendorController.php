<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Application\Usecases\Admin\Vendors\UsecaseIndex;

class VendorController extends Controller
{
    /**
     * @param VendorRepository $repository
     */
    public function index(UsecaseIndex $usecase)
    {
        return view('admin/vendors/index', $usecase());
    }
}
