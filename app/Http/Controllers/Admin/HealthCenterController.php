<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Wstd\Domain\Models\HealthCenter\HealthCenterRepositoryInterface;
use Wstd\View\Presenters\Admin\HealthCentersIndex;
use Wstd\View\Presenters\Bridge;

class HealthCenterController extends Controller
{
    private $repository;

    public function __construct(HealthCenterRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $collection = $this->repository->find();
        return Bridge::view(new HealthCentersIndex($collection));
    }
}
