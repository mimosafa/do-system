<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Wstd\Domain\Models\BusinessArea\BusinessAreaRepositoryInterface;
use Wstd\View\Presenters\Admin\BusinessAreasIndex;
use Wstd\View\Presenters\Bridge;

class BusinessAreaController extends Controller
{
    private $repository;

    public function __construct(BusinessAreaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'prefecture_id' => 'int|min:1|max:47',
        ]);

        $collection = $this->repository->find($request->all());
        return Bridge::view(new BusinessAreasIndex($collection));
    }
}
