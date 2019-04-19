<?php

namespace Wstd\Advertisement;

use Illuminate\Database\Eloquent\Relations\MorphOne;

use Wstd\Advertisement\Advertisement;
use Wstd\Advertisement\Models\Advertisement as Model;
use Wstd\Advertisement\Values\Advertisement as Value;

trait AdvertisableTrait
{
    /**
     * @var Wstd\Advertisement\Advertisement
     */
    protected $advertisementInstance;

    public function advertisementMorphOne(): MorphOne
    {
        return $this->morphOne(Model::class, 'advertisable');
    }

    protected static function bootAdvertisableTrait()
    {
        static::retrieved(function($model) {
            $model->advertisementInstance = new Advertisement($model);
        });

        static::saved(function($model) {
            $model->advertisementInstance->save();
        });
    }

    protected function initNewAdvertisementInstance()
    {
        $this->advertisementInstance ?? $this->advertisementInstance = new Advertisement($this);
    }

    public function getAdvertisement(string $key)
    {
        return $this->advertisementInstance->$key;
    }

    public function setAdvertisement(string $key, $value)
    {
        $this->initNewAdvertisementInstance();
        $this->advertisementInstance->$key = $value;
    }
}
