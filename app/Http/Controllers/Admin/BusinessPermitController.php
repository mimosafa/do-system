<?php

namespace App\Http\Controllers\Admin;

use Wstd\Application\Requests\Admin\BusinessPermitRequest;
use Wstd\Domain\Services\BusinessPermitService;
use Wstd\View\Presenters\Bridge;
use Wstd\View\Presenters\Admin\BusinessPermitsIndex;
use Wstd\View\Presenters\Admin\BusinessPermitsShow;

class BusinessPermitController extends Controller
{
    private $service;

    public function __construct(BusinessPermitService $service)
    {
        parent::__construct();
        
        $this->service = $service;
    }

    public function index(BusinessPermitRequest $request)
    {
        $collection = $this->service->find($request->all());
        return Bridge::view(new BusinessPermitsIndex($collection));
    }

    public function show(int $id)
    {
        $entity = $this->service->find($id);
        return Bridge::view(new BusinessPermitsShow($entity));
    }

    public function store(BusinessPermitRequest $request)
    {
        $id = $this->service->store($request->all())->getId();
        return redirect()->route('admin.businessPermits.show', compact('id'));
    }

    public function update(int $id, BusinessPermitRequest $request)
    {
        $id = $this->service->update($id, $request->all())->getId();
        return redirect()->route('admin.businessPermits.show', compact('id'));
    }
}
