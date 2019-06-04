<?php

namespace Wstd\Infrastructure\Modules\Advertisement;

use Illuminate\Database\Eloquent\Relations\MorphOne;

use Wstd\Infrastructure\Modules\Advertisement\Advertisement;
use Wstd\Infrastructure\Modules\Advertisement\Models\Advertisement as Model;

trait AdvertisableTrait
{
    /**
     * @var Wstd\Infrastructure\Modules\Advertisement\Advertisement
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
            if (isset($model->advertisementInstance)) {
                $model->advertisementInstance->save();
            }
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
