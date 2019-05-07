<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Application\Requests\Admin\CarsIndexRequest;
use Wstd\Application\Usecases\Admin\CarsIndexUsecase;
use Wstd\Infrastructure\Repositories\CarRepository;

class CarController extends Controller
{
    public function index(CarsIndexRequest $request, CarsIndexUsecase $usecase)
    {
        return $usecase($request);
    }
}
