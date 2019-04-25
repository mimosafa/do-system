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
        $shop->name = $shop->name ?? $request->name;
        if ($request->has('copy')) {
            $shop->copy = $request->copy;
        }
        if ($request->has('short_text')) {
            $shop->short_text = $request->short_text;
        }
        if ($request->has('text')) {
            $shop->text = $request->text;
        }
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
