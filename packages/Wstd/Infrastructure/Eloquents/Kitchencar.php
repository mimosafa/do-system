<?php

namespace Wstd\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Wstd\Infrastructure\Eloquents\Brand;
use Wstd\Infrastructure\Eloquents\Car;

class Kitchencar extends Pivot
{
    protected $table = 'kitchencars';
    
    public $incrementing = true;

    protected $fillable = [
        'car_id',
        'brand_id',
        'order',
    ];

    private $readonly = [
        'vendor_id',
        'car_id',
        'brand_id',
    ];

    /**
     * Overwrite Illuminate\Database\Eloquent\Model::performUpdate()
     * `vendor_id` と `car_id` と `brand_id` は変更不可
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return bool
     */
    protected function performUpdate(Builder $query)
    {
        foreach ($this->readonly as $key) {
            if ($this->isDirty($key)) {
                return false;
            }
        }

        return parent::performUpdate($query);
    }

    /**
     * Overwrite Illuminate\Database\Eloquent\Model::performInsert()
     * 車両の事業者とブランドの事業者は同一でないと駄目
     * 同一の場合は $attributes['vendor_id'] に事業者のID をセット
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return bool
     */
    protected function performInsert(Builder $query)
    {
        $car = Car::findOrFail($this->getAttribute('car_id'));
        $brand = Brand::findOrFail($this->getAttribute('brand_id'));

        $vendor = $car->vendor;

        if (! $vendor->is($brand->vendor)) {
            return false;
        }

        $this->setAttribute('vendor_id', $vendor->id);

        return parent::performInsert($query);
    }
}
