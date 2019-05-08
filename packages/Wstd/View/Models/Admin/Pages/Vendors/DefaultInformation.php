<?php

namespace Wstd\View\Models\Admin\Pages\Vendors;

use Wstd\Domain\Models\Vendor\VendorValueStatus;
use Wstd\View\Models\Admin\Components\Forms\FormInterface;
use Wstd\View\Models\Admin\Components\Forms\Select;
use Wstd\View\Models\Admin\Includes\AbstractDefaultInformation;

class DefaultInformation extends AbstractDefaultInformation
{
    public $items = [
        'id',
        'status',
    ];

    public $itemLabels = [
        'id' => 'ID',
        'name' => '事業者名',
        'status' => '状態',
    ];

    public $editableItems = [
        'name',
        'status',
    ];

    public function headerCallback(): string
    {
        $name = e($this->entity->getName());
        return <<< HEADER
            <small class="muted">事業者名</small>
            <br>
            $name
HEADER;
    }

    public function statusCallback()
    {
        return $this->entity->getStatus()->getLabel();
    }

    public function statusFormCallback()
    {
        $options = VendorValueStatus::values();
        $optionGetValue = [$this, 'statusGetValue'];
        $optionIsSelected = [$this, 'statusIsSelected'];
        $optionGetLabel = [$this, 'statusGetLabel'];

        return new Select(
            'status',
            $this->entity->getStatus(),
            $options,
            $optionGetValue,
            $optionIsSelected,
            $optionGetLabel,
            $this->itemLabels['status']);
    }

    public function statusGetValue(VendorValueStatus $status)
    {
        return $status->getValue();
    }

    public function statusIsSelected(VendorValueStatus $status)
    {
        return $status->equals($this->entity->getStatus());
    }

    public function statusGetLabel(VendorValueStatus $status)
    {
        return $status->getLabel();
    }
}
