<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Wstd\Application\Requests\Admin\CarUpdateRequest;
use Wstd\Application\Requests\Admin\CarsIndexRequest;
use Wstd\Application\Usecases\Admin\CarUpdateUsecase;

use Wstd\Domain\Services\CarService;
use Wstd\View\Admin\Pages\Cars\Show;

use Wstd\View\Presenters\Admin\CarsIndex;
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

    public function index(CarsIndexRequest $request)
    {
        $collection = $this->service->find($request->all());
        return Bridge::view(new CarsIndex($collection));
    }

    public function show(int $id)
    {
        $entity = $this->service->find($id);

        $view = new Show($entity);
        return view($view->template(), $view);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vendor_id' => 'required|integer',
            'name' => 'required|string|max:100',
            'vin' => 'required|string|max:20',
        ]);

        $id = $this->service->store($validated)->getId();
        return redirect()->route('admin.cars.show', compact('id'));
    }

    public function update(int $id, CarUpdateRequest $request, CarUpdateUsecase $usecase)
    {
        return $usecase($id, $request);
    }
}
