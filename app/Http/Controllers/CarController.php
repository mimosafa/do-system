<?php

namespace App\Http\Controllers;

use App\Car;
use App\Vendor;
use App\Http\Requests\CreateCar;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('admin.cars.index', [
            'cars' => $cars,
        ]);
    }

    public function show(int $id)
    {
        return view('admin/cars/show', [
            'car' => Car::find($id),
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

        return redirect()->route('admin.cars.index');
    }
}
