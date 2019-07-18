<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Wstd\Domain\Models\City\CityRepositoryInterface;
use Wstd\View\Presenters\Admin\CitiesIndex;
use Wstd\View\Presenters\Bridge;

class CityController extends Controller
{
    private $repository;

    public function __construct(CityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'prefecture_id' => 'int|min:1|max:47',
        ]);

        $collection = $this->repository->find($request->all());
        return Bridge::view(new CitiesIndex($collection));
    }
}
