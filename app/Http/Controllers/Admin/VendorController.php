<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\View\Models\Admin\Pages\Vendors\IndexViewModel;

class VendorController extends Controller
{
    /**
     * @param VendorRepository $repository
     */
    public function index(IndexViewModel $viewModel)
    {
        return view('admin/templates/index', $viewModel);
    }
}
