<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Car;
use App\Kitchencar;
use App\Vendor;
use Illuminate\Http\Request;

class KitchencarController extends Controller
{
    public function index()
    {
        $kitchencars = Kitchencar::all();
        return view('admin/kitchencars/index', [
            'kitchencars' => $kitchencars,
        ]);
    }

    public function show(int $id)
    {
        $kitchencar = Kitchencar::findOrFail($id);
        return view('admin/kitchencars/show', [
            'kitchencar' => $kitchencar,
        ]);
    }

    public function create(string $models = '', int $id = 0)
    {
        $params = [];
        $next = 'disabled';

        if (! $models) {
            $params['vendors'] = Vendor::expandable()->get();
            $next = 'continue';
        } else if ($models === 'vendors') {
            $params['vendor'] = $vendor = Vendor::findOrFail($id);
            $params['cars']   = $cars   = $vendor->cars;
            $params['shops'] = $shops = $vendor->shops;
            if ($cars->isNotEmpty() && $shops->isNotEmpty()) {
                $next = 'store';
            }
        } else if ($models === 'cars') {
            $params['car']    = $car    = Car::findOrFail($id);
            $params['vendor'] = $vendor = $car->vendor;
            $params['shops'] = $shops = $vendor->shops;
            if ($shops->isNotEmpty()) {
                $next = 'store';
            }
        } else if ($models === 'shops') {
            $params['shop']   = $shop  = Shop::findOrFail($id);
            $paramas['vendor'] = $vendor = $shop->vendor;
            $params['cars']    = $cars   = $vendor->cars;
            if ($cars->isNotEmpty()) {
                $next = 'store';
            }
        }
        $params['next'] = $next;

        return view('admin/kitchencars/create', $params);
    }

    public function store(Request $request)
    {
        $validated_1 = $request->validate([
            'car_id' => 'integer',
            'shop_id' => 'integer',
        ]);

        if (isset($validated_1['shop_id'])) {
            $shop = Shop::findOrFail($validated_1['shop_id']);
        }
        if (isset($validated_1['car_id'])) {
            $car = Car::findOrFail($validated_1['car_id']);
        }

        if (isset($shop) && isset($car)) {
            $kitchencar = new Kitchencar();
            $kitchencar->car_id = $car->id;
            $kitchencar->shop_id = $shop->id;
            $kitchencar->save();

            return redirect()->route('admin.kitchencars.show', [
                'id' => $kitchencar->id,
            ]);
        }

        if (isset($shop)) {
            return $this->create('shops', $shop->id);
        } else if (isset($car)) {
            return $this->create('cars', $car->id);
        }

        $validated_2 = $request->validate([
            'vendor_id' => 'required|integer',
        ]);

        return $this->create('vendors', $validated_2['vendor_id']);
    }
}
