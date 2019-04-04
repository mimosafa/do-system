<?php

namespace App\Http\Controllers;

use App\Car;
use App\Vendor;
use App\Http\Requests\CreateCar;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('cars/index', [
            'cars' => $cars,
        ]);
    }

    public function showCreateForm(int $id = 0)
    {
        if ($id) {
            if (!$vendor = Vendor::find($id)) {
                abort(404);
            }
            $args = [
                'vendor' => $vendor,
                'ref' => route('vendors.show', ['id' => $id]),
            ];
        } else {
            $args = [
                'vendors' => Vendor::all(),
                'ref' => route('cars.index'),
            ];
        }
        return view('cars/create', $args);
    }

    public function create(CreateCar $request)
    {
        $car = new Car();
        $car->vendor_id = $request->vendor_id;
        $car->name = $request->car_name;
        $car->vin = $request->vin;
        $car->save();

        return redirect()->route('cars.index');
    }
}
