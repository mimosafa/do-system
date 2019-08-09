<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Application\Requests\Admin\BusinessPermitRequest;
use Wstd\Domain\Services\BusinessPermitService;
use Wstd\View\Presenters\Bridge;
use Wstd\View\Presenters\Admin\BusinessPermitsIndex;

class BusinessPermitController extends Controller
{
    private $service;

    public function __construct(BusinessPermitService $service)
    {
        $this->service = $service;
    }

    public function index(BusinessPermitRequest $request)
    {
        $collection = $this->service->find($request->all());
        return Bridge::view(new BusinessPermitsIndex($collection));
    }

    public function store(BusinessPermitRequest $request)
    {
        $id = $this->service->store($request->all())->getId();
        return back();
    }
}
