<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Brand;
use App\Genre;
use App\Vendor;
use App\Http\Requests\CreateBrand;
use App\Http\Requests\EditBrand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('vendor_id')->get();

        return view('admin.brands.index', [
            'brands' => $brands,
        ]);
    }

    public function show(int $id)
    {
        return view('admin/brands/show', [
            'brand' => Brand::findOrFail($id),
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
        $brand->save();

        $ad = new Advertisement([
            'title_secondary' => $request->ad_copy,
            'description_primary' => $request->ad_text,
            'content_primary' => $request->description,
        ]);

        $brand->advertisement()->save($ad);

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

        $ad = $brand->advertisement;

        $ad->title_secondary = $request->ad_copy;
        $ad->description_primary = $request->ad_text;
        $ad->description_secondary = '';
        $ad->content_primary = $request->description;

        $ad->save();

        $brand->name = $request->name;
        if ($image = $request->image) {
            $brand->uploaded_file = $image;
        }
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
