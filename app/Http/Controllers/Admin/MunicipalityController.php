<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Wstd\Domain\Models\Municipality\MunicipalityRepositoryInterface;
use Wstd\View\Presenters\Admin\MunicipalitiesIndex;
use Wstd\View\Presenters\Bridge;

class MunicipalityController extends Controller
{
    private $repository;

    public function __construct(MunicipalityRepositoryInterface $repository)
    {
        parent::__construct();
        
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'prefecture_id' => 'int|min:1|max:47',
        ]);

        $collection = $this->repository->find($request->all());
        return Bridge::view(new MunicipalitiesIndex($collection));
    }
}
