<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Shop;
use App\Genre;
use App\Vendor;
use App\Values\Shop\Status;
use App\Http\Requests\CreateShop;
use App\Http\Requests\EditShop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status ?? Status::getIndexableValues();
        $shops = Shop::inStatus($status)->orderBy('vendor_id', 'asc')->get();

        return view('admin.shops.index', [
            'shops' => $shops,
            'shown_statuses' => $status,
            'all_statuses' => Status::values(),
        ]);
    }

    public function show(int $id)
    {
        return view('admin/shops/show', [
            'shop' => Shop::findOrFail($id),
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
                'vendors' => Vendor::expandable()->get(),
                'ref' => [
                    'url' => route('admin.shops.index'),
                    'text' => '店舗一覧',
                ],
            ];
        }
        return view('admin/shops/create', $args);
    }

    public function store(CreateShop $request)
    {
        $shop = new Shop();
        $shop->vendor_id = $request->vendor_id;
        $shop->name = $request->name;
        $shop->save();

        $ad = new Advertisement([
            'title_secondary' => $request->ad_copy,
            'description_primary' => $request->ad_text,
            'content_primary' => $request->description,
        ]);

        $shop->advertisement()->save($ad);

        return redirect()->route('admin.shops.show', ['shop' => $shop]);
    }

    public function edit(int $id)
    {
        $shop = Shop::find($id);
        $genre_ids = [];
        $genres = $shop->genres;
        if ($genres->isNotEmpty()) {
            foreach ($genres as $genre) {
                $genre_ids[] = $genre->id;
            }
        }

        return view('admin/shops/edit', [
            'shop' => $shop,
            'genre_ids' => $genre_ids,
            'all_genres' => Genre::all(),
        ]);
    }

    public function update(int $id, EditShop $request)
    {
        $shop = Shop::find($id);

        $ad = $shop->advertisement;

        $ad->title_secondary = $request->ad_copy;
        $ad->description_primary = $request->ad_text;
        $ad->description_secondary = '';
        $ad->content_primary = $request->description;

        $ad->save();

        $shop->name = $request->name;
        if ($image = $request->image) {
            $shop->uploaded_file = $image;
        }
        if ($request->genres) {
            $shop->genres()->detach();
            $shop->genres()->attach($request->genres);
        }
        $shop->status = $request->status;
        $shop->save();

        return redirect()->route('admin.shops.show', [
            'shop' => $shop,
        ]);
    }
}
