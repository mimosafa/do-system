<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();

        return view('vendors/index', [
            'vendors' => $vendors,
        ]);
    }

    public function details(int $id)
    {
        $vendor = Vendor::find($id);
        return view('vendors/details', [
            'vendor' => $vendor,
        ]);
    }
}
