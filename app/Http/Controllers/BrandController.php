<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Genre;
use App\Vendor;
use App\Http\Requests\CreateBrand;
use App\Http\Requests\EditBrand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('admin.brands.index', [
            'brands' => $brands,
        ]);
    }

    public function show(int $id)
    {
        return view('admin/brands/show', [
            'brand' => Brand::find($id),
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
                'vendors' => Vendor::all(),
                'ref' => [
                    'url' => route('admin.brands.index'),
                    'text' => 'ブランド一覧',
                ],
            ];
        }
        return view('admin/brands/create', $args);
    }

    public function store(CreateBrand $request)
    {
        $brand = new Brand();
        $brand->vendor_id = $request->vendor_id;
        $brand->name = $request->name;
        $brand->ad_copy = $request->ad_copy;
        $brand->ad_text = $request->ad_text;
        $brand->description = $request->description;
        $brand->save();

        return redirect()->route('admin.brands.show', ['brand' => $brand]);
    }

    public function edit(int $id)
    {
        $brand = Brand::find($id);
        $genre_ids = [];
        $genres = $brand->genres;
        if ($genres->isNotEmpty()) {
            foreach ($genres as $genre) {
                $genre_ids[] = $genre->id;
            }
        }

        return view('admin/brands/edit', [
            'brand' => $brand,
            'genre_ids' => $genre_ids,
            'all_genres' => Genre::all(),
        ]);
    }

    public function update(int $id, EditBrand $request)
    {
        $brand = Brand::find($id);

        $brand->name = $request->name;
        $brand->ad_copy = $request->ad_copy;
        $brand->ad_text = $request->ad_text;
        $brand->description = $request->description;
        if ($request->genres) {
            $brand->genres()->detach();
            $brand->genres()->attach($request->genres);
        }
        $brand->save();

        return redirect()->route('admin.brands.show', [
            'brand' => $brand,
        ]);
    }
}
