<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Wstd\Domain\Services\ItemService;
use Wstd\View\Presenters\Admin\ItemsIndex;
use Wstd\View\Presenters\Bridge;

class ItemController extends Controller
{
    private $service;

    public function __construct(ItemService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $collection = $this->service->find([]);
        return Bridge::view(new ItemsIndex($collection));
    }
}
