<?php

namespace App\Usecases\Car;

use App\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveUsecase
{
    public function __invoke(Request $request, int $id = 0): Car
    {
        $car = $id ? Car::findOrFail($id) : new Car();
        $car->user_id = $car->user_id ?? Auth::user()->id;
        $car->vendor_id = $car->vendor_id ?? $request->vendor_id;
        $car->name = $request->name;
        $car->vin = $request->vin;
        if (isset($request->status)) {
            $car->status = $request->status;
        }
        if (isset($request->image)) {
            $car->uploaded_file = $request->image;
        }
        $car->save();

        return $car;
    }
}
