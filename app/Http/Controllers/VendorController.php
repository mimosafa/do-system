<?php

namespace App\Http\Controllers;

use App\Vendor;
use App\Http\Requests\CreateVendor;
use App\Http\Requests\EditVendor;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();

        return view('admin/vendors/index', [
            'vendors' => $vendors,
        ]);
    }

    public function show(int $id)
    {
        $vendor = Vendor::find($id);

        return view('admin/vendors/show', [
            'vendor' => $vendor,
        ]);
    }

    public function create()
    {
        return view('admin/vendors.create');
    }

    public function store(CreateVendor $request)
    {
        $vendor = new Vendor();

        $vendor->name = $request->name;
        $vendor->save();

        return redirect()->route('admin.vendors.show', [
            'id' => $vendor->id,
        ]);
    }

    public function edit(int $id)
    {
        $vendor = Vendor::find($id);

        return view('admin/vendors/edit', [
            'vendor' => $vendor,
        ]);
    }

    public function update(int $id, EditVendor $request)
    {
        $vendor = Vendor::find($id);

        $vendor->name = $request->name;
        $vendor->status = $request->status;

        $vendor->save();

        return view('admin/vendors/show', [
            'vendor' => $vendor,
        ]);
    }
}
