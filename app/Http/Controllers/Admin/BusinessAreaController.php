<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Wstd\Domain\Services\BusinessAreaService;
use Wstd\View\Presenters\Admin\BusinessAreasIndex;
use Wstd\View\Presenters\Bridge;

class BusinessAreaController extends Controller
{
    private $service;

    public function __construct(BusinessAreaService $service)
    {
        parent::__construct();
        
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'prefecture_id' => 'int|min:1|max:47',
        ]);

        $collection = $this->service->find($request->all());
        return Bridge::view(new BusinessAreasIndex($collection));
    }
}
