<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Domain\Models\City\CityRepositoryInterface;
use Wstd\View\Presenters\Admin\CitiesIndex;
use Wstd\View\Presenters\Bridge;

class CityController extends Controller
{
    private $repository;

    public function __construct(CityRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $collection = $this->repository->find();
        return Bridge::view(new CitiesIndex($collection));
    }
}
