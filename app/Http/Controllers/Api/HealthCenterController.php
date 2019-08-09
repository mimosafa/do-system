<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Wstd\Application\Requests\HealthCenterRequest;
use Wstd\Infrastructure\Repositories\HealthCenterRepository;

class HealthCenterController extends Controller
{
    private $repository;

    public function __construct(HealthCenterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(HealthCenterRequest $request)
    {
        $collection = $this->repository->find($request->all());
        return $collection;
    }
}
