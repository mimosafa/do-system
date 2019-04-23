<?php

namespace App\Http\Controllers;

use App\Car;
use App\Vendor;
use App\Values\Car\Status;
use App\Http\Requests\CreateCar;
use App\Http\Requests\EditCar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Usecases\Car\SaveUsecase;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status ?? Status::getIndexableValues();
        $cars = Car::inStatus($status)->get();

        return view('admin.cars.index', [
            'cars' => $cars,
            'shown_statuses' => $status,
            'all_statuses' => Status::values(),
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
        $arguments = [];
        if ($id) {
            $arguments['vendor'] = Vendor::findOrFail($id);
        } else {
            $arguments['vendors'] = Vendor::expandable()->get();
        }
        return view('admin/cars/create', $arguments);
    }

    public function store(CreateCar $request, SaveUsecase $usecase)
    {
        return redirect()->route('admin.cars.show', [
            'car' => $usecase($request, 0),
        ]);
    }

    public function edit(int $id)
    {
        return view('admin/cars/edit', [
            'car' => Car::findOrFail($id),
        ]);
    }

    public function update(int $id, EditCar $request, SaveUsecase $usecase)
    {
        return redirect()->route('admin.cars.show', [
            'car' => $usecase($request, $id),
        ]);
    }
}
