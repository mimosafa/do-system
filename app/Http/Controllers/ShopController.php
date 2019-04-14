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

    public function create(?string $models = '', ?int $id = 0)
    {
        $vendors = Vendor::active()->get();
        return view('admin/shops/create', [
            'vendors' =>$vendors,
            'filled' => [],
        ]);
    }

    public function which(Request $request)
    {
        $validatedData = $request->validate([
            'vendor_id' => 'integer',
            'car_id' => 'integer',
            'brand_id' => 'integer',
        ]);

        $params = [];
        $filled_params = [];

        if (isset($validatedData['vendor_id'])) {
            $vendor = Vendor::find($validatedData['vendor_id']);
            $params['vendor'] = $vendor;
            $filled_params[] = 'vendor';
        }

        if (isset($validatedData['car_id'])) {
            $car = Car::find($validatedData['car_id']);
            if (! isset($params['vendor'])) {
                $params['vendor'] = $car->vendor;
                if (! in_array('vendor', $filled_params)) {
                    $filled_params[] = 'vendor';
                }
                $filled_params[] = 'vendor';
            }
            $params['car'] = $car;
            $filled_params[] = 'car';
        } else {
            if (isset($vendor)) {
                $params['cars'] = $vendor->cars;
            }
        }

        if (isset($validatedData['brand_id'])) {
            $brand = Brand::find($validatedData['brand_id']);
            if (! isset($params['vendor'])) {
                $params['vendor'] = $brand->vendor;
                if (! in_array('vendor', $filled_params)) {
                    $filled_params[] = 'vendor';
                }
            }
            $params['brand'] = $brand;
            $filled_params[] = 'brand';
        } else {
            if (isset($vendor)) {
                $params['brands'] = $vendor->brands;
            }
        }

        if ($filled = count($filled_params) === 3) {
            return $this->store($request);
        }

        $params['filled'] = $filled;

        return view('admin/shops/create', $params);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vendor_id' => 'required|integer',
            'car_id' => 'required|integer',
            'brand_id' => 'required|integer',
        ]);

        $shop = new Shop();
        $shop->brand_id = $validatedData['brand_id'];
        $shop->car_id = $validatedData['car_id'];
        $shop->save();

        return view('admin/shop/index', [
            'shop' => Shop::all(),
        ]);
    }
}
