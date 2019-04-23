<?php

namespace App\Usecases\Shop;

use App\Shop,
    App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveUsecase
{
    public function __invoke(Request $request, int $id = 0): Shop
    {
        $shop = $id ? Shop::findOrFail($id) : new Shop();
        $shop->user_id = $shop->user_id ?? Auth::user()->id;
        $shop->vendor_id = $shop->vendor_id ?? $request->vendor_id;
        $shop->name = $request->name ?? Vendor::find($shop->vendor_id)->name;
        $shop->copy = $request->copy;
        $shop->short_text = $request->short_text;
        $shop->text = $request->text;
        if (isset($request->status)) {
            $shop->status = $request->status;
        }
        if (isset($request->image)) {
            $shop->uploaded_file = $request->image;
        }
        $shop->save();

        if ($request->genres) {
            $shop->genres()->detach();
            $shop->genres()->attach($request->genres);
        }

        return $shop;
    }
}
