<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVendor;
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

    public function show(int $id)
    {
        $vendor = Vendor::find($id);
        return view('vendors/show', [
            'vendor' => $vendor,
        ]);
    }

    public function showCreateForm()
    {
        return view('vendors/create');
    }

    public function create(CreateVendor $request)
    {
        $vendor = new Vendor();
        $vendor->name = $request->vendor_name;
        $vendor->save();

        return redirect()->route('vendors.show', [
            'id' => $vendor->id,
        ]);
    }
}
