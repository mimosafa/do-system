<?php

namespace Wstd\View\Models\Admin\Pages\Cars;

use Wstd\Domain\Models\Car\CarValueStatus;
use Wstd\View\Models\Admin\Components\Forms\InputText;
use Wstd\View\Models\Admin\Components\Forms\Select;
use Wstd\View\Models\Admin\Includes\AbstractDefaultInformation;

class DefaultInformation extends AbstractDefaultInformation
{
    public $items = [
        'id',
        'vin',
        'status',
    ];

    public $itemLabels = [
        'id' => 'ID',
        'name' => '車両名',
        'vin' => '車両No',
        'status' => '状態',
    ];

    public $editableItems = [
        'name',
        'vin',
        'status',
    ];

    public function headerCallback(): string
    {
        $name = e($this->entity->getName());
        $vendor = sprintf(
            '<a href="%s">%s</a>',
            route('admin.vendors.show', ['id' => $this->entity->getVendor()->getId(),]),
            '<i class="fa fa-user"></i> ' . $this->entity->getVendor()->getName()
        );
        return <<< HEADER
            <i class="fa fa-car text-muted"></i> $name
            <br>
            <small>
                $vendor
            </small>
HEADER;
    }

    public function vinCallback()
    {
        return $this->entity->getVin()->getValue();
    }

    public function statusCallback()
    {
        return $this->entity->getStatus()->getLabel();
    }

    public function vinFormCallback()
    {
        return new InputText('vin', $this->entity->getVin()->getValue(), $this->itemLabels['vin']);
    }

    public function statusFormCallback()
    {
        $options = CarValueStatus::values();
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
            $this->itemLabels['status']
        );
    }

    public function statusGetValue(CarValueStatus $status)
    {
        return $status->getValue();
    }

    public function statusIsSelected(CarValueStatus $status)
    {
        return $status->equals($this->entity->getStatus());
    }

    public function statusGetLabel(CarValueStatus $status)
    {
        return $status->getLabel();
    }
}
