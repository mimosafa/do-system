<?php

namespace App\Http\Controllers;

use App\Car;
use App\Vendor;
use App\Values\Car\Status;
use App\Http\Requests\CreateCar;
use App\Http\Requests\EditCar;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status ?? Status::getIndexableValues();
        $cars = Car::inStatus($status)->get();

        return view('admin.cars.index', [
            'cars' => $cars,
            'shown_statuses' => $status,
            'all_statuses' => Status::all(),
        ]);
    }

    public function show(int $id)
    {
        return view('admin/cars/show', [
            'car' => Car::findOrFail($id),
        ]);
    }

    public function create(int $id = 0)
    {
        if ($id) {
            if (!$vendor = Vendor::find($id)) {
                abort(404);
            }
            $args = [
                'vendor' => $vendor,
                'ref' => [
                    'url' => route('admin.vendors.show', ['id' => $id]),
                    'text' => $vendor->name . 'の事業者詳細',
                ],
            ];
        } else {
            $args = [
                'vendors' => Vendor::all(),
                'ref' => [
                    'url' => route('admin.cars.index'),
                    'text' => '車両一覧',
                ],
            ];
        }
        return view('admin/cars/create', $args);
    }

    public function store(CreateCar $request)
    {
        $car = new Car();
        $car->vendor_id = $request->vendor_id;
        $car->name = $request->name;
        $car->vin = $request->vin;
        $car->save();

        return redirect()->route('admin.cars.show', ['car' => $car]);
    }

    public function edit(int $id)
    {
        $car = Car::find($id);

        return view('admin/cars/edit', [
            'car' => $car,
        ]);
    }

    public function update(int $id, EditCar $request)
    {
        $car = Car::find($id);

        $car->name = $request->name;
        $car->vin = $request->vin;
        $car->status = (int) $request->status;
        if ($image = $request->image) {
            $car->uploaded_file = $image;
        }
        $car->save();

        return redirect()->route('admin.cars.show', [
            'car' => $car,
        ]);
    }
}
