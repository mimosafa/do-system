<?php

namespace Wstd\Advertisement;

use Wstd\Advertisement\AdvertisableIntterface;
use Wstd\Advertisement\Models\Advertisement as Model;
use Wstd\Advertisement\Values\Advertisement as Values;

class Advertisement
{
    protected $advertisable;

    protected $eloquent;

    /**
     * @var Wstd\Advertisement\Values\Advertisement
     */
    protected $values;

    /**
     * @var array
     */
    protected $newValues = [];

    protected static $valueObjectKeys = [
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
        if (in_array($key, self::$valueObjectKeys, true)) {
            return $this->values->$key ?? null;
        }
        if (is_array($this->values->other_values)) {
            return $this->values->other_values[$key] ?? null;
        }
    }

    public function __set($key, $value)
    {
        if (in_array($key, self::$valueObjectKeys, true)) {
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
