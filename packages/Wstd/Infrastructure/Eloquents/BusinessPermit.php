<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Wstd\Infrastructure\Eloquents\Car;

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
