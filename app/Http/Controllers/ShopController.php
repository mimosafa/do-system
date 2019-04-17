<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Car;
use App\Shop;
use App\Vendor;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('admin/shops/index', [
            'shops' => $shops,
        ]);
    }

    public function show(int $id)
    {
        $shop = Shop::findOrFail($id);
        return view('admin/shops/show', [
            'shop' => $shop,
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
            $params['brands'] = $brands = $vendor->brands;
            if ($cars->isNotEmpty() && $brands->isNotEmpty()) {
                $next = 'store';
            }
        } else if ($models === 'cars') {
            $params['car']    = $car    = Car::findOrFail($id);
            $params['vendor'] = $vendor = $car->vendor;
            $params['brands'] = $brands = $vendor->brands;
            if ($brands->isNotEmpty()) {
                $next = 'store';
            }
        } else if ($models === 'brands') {
            $params['brand']   = $brand  = Brand::findOrFail($id);
            $paramas['vendor'] = $vendor = $brand->vendor;
            $params['cars']    = $cars   = $vendor->cars;
            if ($cars->isNotEmpty()) {
                $next = 'store';
            }
        }
        $params['next'] = $next;

        return view('admin/shops/create', $params);
    }

    public function store(Request $request)
    {
        $validated_1 = $request->validate([
            'car_id' => 'integer',
            'brand_id' => 'integer',
        ]);

        if (isset($validated_1['brand_id'])) {
            $brand = Brand::findOrFail($validated_1['brand_id']);
        }
        if (isset($validated_1['car_id'])) {
            $car = Car::findOrFail($validated_1['car_id']);
        }

        if (isset($brand) && isset($car)) {
            $shop = new Shop();
            $shop->car_id = $car->id;
            $shop->brand_id = $brand->id;
            $shop->save();

            return redirect()->route('admin.shops.show', [
                'id' => $shop->id,
            ]);
        }

        if (isset($brand)) {
            return $this->create('brands', $brand->id);
        } else if (isset($car)) {
            return $this->create('cars', $car->id);
        }

        $validated_2 = $request->validate([
            'vendor_id' => 'required|integer',
        ]);

        return $this->create('vendors', $validated_2['vendor_id']);
    }
}
