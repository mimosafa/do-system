<?php

namespace App\Http\Controllers;

use App\Vendor;
use App\Values\Vendor\Status;
use App\Http\Requests\CreateVendor;
use App\Http\Requests\EditVendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status ?? Status::indexableValues();
        $vendors = Vendor::inStatus($status)->get();

        return view('admin/vendors/index', [
            'vendors' => $vendors,
            'shown_statuses' => $status,
            'all_statuses' => Status::all(),
        ]);
    }

    public function show(int $id)
    {
        return view('admin/vendors/show', [
            'vendor' => Vendor::findOrFail($id),
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
        $vendor->status = (int) $request->status;

        $vendor->save();

        return view('admin/vendors/show', [
            'vendor' => $vendor,
        ]);
    }
}
