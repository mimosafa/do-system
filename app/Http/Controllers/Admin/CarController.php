<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Wstd\Application\Requests\Admin\CarRequest;
use Wstd\Domain\Models\Car\CarValueStatus;
use Wstd\Domain\Services\CarService;
use Wstd\View\Presenters\Admin\CarsIndex;
use Wstd\View\Presenters\Admin\CarsShow;
use Wstd\View\Presenters\Bridge;

class CarController extends Controller
{
    /**
     * @var Wstd\Domain\Services\CarService
     */
    private $service;

    /**
     * Constructor
     *
     * @param Wstd\Domain\Services\CarService $service
     */
    public function __construct(CarService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $validated = $request->validate([
            'vendor_id' => 'int',
            'name' => 'string',
            'vin' => 'string',
            'status' => 'array|' . Rule::in(CarValueStatus::toArray()),
        ]);

        $collection = $this->service->find($request->all());
        return Bridge::view(new CarsIndex($collection));
    }

    public function show(int $id)
    {
        $entity = $this->service->find($id);
        return Bridge::view(new CarsShow($entity));
    }

    public function store(CarRequest $request)
    {
        $id = $this->service->store($request->all())->getId();
        return redirect()->route('admin.cars.show', compact('id'));
    }

    public function update(int $id, CarRequest $request)
    {
        $id = $this->service->update($id, $request->all())->getId();
        return redirect()->route('admin.cars.show', compact('id'));
    }
}
