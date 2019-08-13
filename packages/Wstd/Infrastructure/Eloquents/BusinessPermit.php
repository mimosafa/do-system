<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Wstd\Infrastructure\Eloquents\Car;
use Wstd\Infrastructure\Eloquents\Vendor;

class BusinessPermit extends Model
{
    protected $guarded = ['id'];

    protected $attributes = [
        'aplicant_properties' => '[]',
        'other_properties' => '[]',
    ];

    protected $casts = [
        'aplicant_properties' => 'array',
        'other_properties' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder
                ->orderBy('health_center_id', 'asc')
            ;
        });
    }

    public function approved()
    {
        return $this->morphTo();
    }

    /**
     * $eloquent->car_id = $carId
     *
     * @todo ...
     */
    public function setCarIdAttribute(int $carId)
    {
        $car = Car::findOrFail($carId);
        $this->setAttribute('approved_type', 'car');
        $this->setAttribute('approved_id', $car->id);
    }
}
