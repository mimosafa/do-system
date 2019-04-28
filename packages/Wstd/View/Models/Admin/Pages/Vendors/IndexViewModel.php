<?php

namespace Wstd\View\Models\Admin\Pages\Vendors;

use Spatie\ViewModels\ViewModel;
use Wstd\Infrastructure\Repositories\VendorRepository;

class IndexViewModel extends ViewModel
{
    protected $repository;

    public $model_name = 'vendor';
    public $model_label = '事業者';

    public $datatable = true;

    public function __construct(VendorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        return $this->repository->list();
    }

    //
}
