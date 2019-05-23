<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Application\Requests\Admin\CarUpdateRequest;
use Wstd\Application\Requests\Admin\CarsIndexRequest;
use Wstd\Application\Usecases\Admin\CarShowUsecase;
use Wstd\Application\Usecases\Admin\CarUpdateUsecase;

use Wstd\Domain\Services\CarService;
use Wstd\View\Admin\Pages\Cars\Index;

class CarController extends Controller
{
    public function index(CarsIndexRequest $request, CarService $service)
    {
        $view = new Index($service->find($request));
        return view($view->template(), $view);
    }

    public function show(int $id, CarShowUsecase $usecase)
    {
        return $usecase($id);
    }

    public function update(int $id, CarUpdateRequest $request, CarUpdateUsecase $usecase)
    {
        return $usecase($id, $request);
    }
}
