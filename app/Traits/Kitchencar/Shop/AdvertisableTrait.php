<?php

namespace App\Traits\Kitchencar\Shop;

use Wstd\Advertisement\AdvertisableTrait as Advertisable;

trait AdvertisableTrait
{
    use Advertisable {
        getAdvertisement as get;
        setAdvertisement as set;
    }

    /**
     * @var string 'copy'
     */
    public function getCopyAttribute()
    {
        return $this->get('title_secondary');
    }
    public function setCopyAttribute($value)
    {
        $this->set('title_secondary', $value);
    }

    /**
     * @var string 'short_text'
     */
    public function getShortTextAttribute()
    {
        return $this->get('description_primary');
    }
    public function setShortTextAttribute($value)
    {
        $this->set('description_primary', $value);
    }

    /**
     * @var string 'text'
     */
    public function getTextAttribute()
    {
        return $this->get('content_primary');
    }
    public function setTextAttribute($value)
    {
        $this->set('content_primary', $value);
    }
}
