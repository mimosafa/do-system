<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Application\Usecases\Admin\CarShowUsecase;
use Wstd\Application\Requests\Admin\CarsIndexRequest;
use Wstd\Application\Usecases\Admin\CarsIndexUsecase;

class CarController extends Controller
{
    public function index(CarsIndexRequest $request, CarsIndexUsecase $usecase)
    {
        return $usecase($request);
    }

    public function show(int $id, CarShowUsecase $usecase)
    {
        return $usecase($id);
    }
}
