<?php

namespace Wstd\Infrastructure\Modules\Advertisement;

use Wstd\Infrastructure\Modules\Advertisement\AdvertisableIntterface;
use Wstd\Infrastructure\Modules\Advertisement\Models\Advertisement as Model;
use Wstd\Infrastructure\Modules\Advertisement\Values\Advertisement as Values;

class Advertisement
{
    /**
     * @var Wstd\Infrastructure\Modules\Advertisement\AdvertisableInterface
     */
    protected $advertisable;

    /**
     * @var Wstd\Infrastructure\Modules\Advertisement\Models\Advertisement
     */
    protected $eloquent;

    /**
     * @var Wstd\Infrastructure\Modules\Advertisement\Values\Advertisement
     */
    protected $values;

    /**
     * @var array
     */
    protected $newValues = [];

    /**
     * @var array
     * @see Wstd\Infrastructure\Modules\Advertisement\Values\Advertisement
     */
    protected static $defaultKeys = [
        'title_primary',
        'title_secondary',
        'description_primary',
        'description_secondary',
        'content_primary',
        'content_secondary',
    ];

    public function __construct(AdvertisableInterface $advertisable)
    {
        $this->advertisable = $advertisable;
        $this->eloquent = $this->advertisable->advertisementMorphOne ?? new Model();
        $this->values = Values::instance($this->eloquent);
    }

    public function __get($key)
    {
        if (in_array($key, self::$defaultKeys, true)) {
            return $this->values->$key ?? null;
        }
        if (is_array($this->values->other_values)) {
            return $this->values->other_values[$key] ?? null;
        }
    }

    public function __set($key, $value)
    {
        if (in_array($key, self::$defaultKeys, true)) {
            $this->newValues[$key] = $value;
        } else {
            if (! isset($this->newValues['other_values'])) {
                $this->newValues['other_values'] = [];
            }
            $this->newValues['other_values'][$key] = $value;
        }
    }

    public function save()
    {
        if (empty($this->newValues)) {
            return;
        }
        $newValues = Values::instanceByArray($this->newValues);
        if (Values::equals($this->values, $newValues)) {
            return;
        }
        $this->eloquent->fill($newValues->toArray());
        $this->advertisable->advertisementMorphOne()->save($this->eloquent);
    }
}
