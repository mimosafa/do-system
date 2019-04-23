<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Genre;
use App\Vendor;
use App\Values\Shop\Status;
use App\Http\Requests\CreateShop;
use App\Http\Requests\EditShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Usecases\Shop\SaveUsecase;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status ?? Status::getIndexableValues();
        $shops = Shop::inStatus($status)->get();

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
        $arguments = [];
        if ($id) {
            $arguments['vendor'] = Vendor::findOrFail($id);
        } else {
            $arguments['vendors'] = Vendor::expandable()->get();
        }
        return view('admin/shops/create', $arguments);
    }

    public function store(CreateShop $request, SaveUsecase $usecase)
    {
        return redirect()->route('admin.shops.show', [
            'shop' => $usecase($request, 0),
        ]);
    }

    public function edit(int $id)
    {
        $shop = Shop::findOrFail($id);
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

    public function update(int $id, EditShop $request, SaveUsecase $usecase)
    {
        return redirect()->route('admin.shops.show', [
            'shop' => $usecase($request, $id),
        ]);
    }
}
