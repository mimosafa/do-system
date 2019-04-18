<?php

namespace Wstd\Advertisement;

use Wstd\Advertisement\AdvertisableIntterface;
use Wstd\Advertisement\Models\Advertisement as Model;
use Wstd\Advertisement\Values\Advertisement as Values;

class Advertisement
{
    protected $advertisable;

    protected $eloquent;

    public function __construct(AdvertisableIntterface $advertisable)
    {
        $this->advertisable = $advertisable;
        $this->eloquent = $this->advertisable->advertisement ?? new Model();
    }
}
