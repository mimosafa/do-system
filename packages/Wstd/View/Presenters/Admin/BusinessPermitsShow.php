<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Presenters\IdentifiedPresenter;
use Wstd\View\Presenters\Admin\Templates\Properties;

class BusinessPermitsShow extends IdentifiedPresenter
{
    protected $entity;

    public $id = 'business-permit';
    public $title = '営業許可証詳細';

    public $properties;

    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
        $this->initProperties();
    }

    protected function initProperties()
    {
        $id = $this->id . '_properties';
        $header = $this->getPermission();
        $properties = [
            'vendor',
            'approved',
            'prefecture',
            'business_area',
            'end_date',
            'health_center',
            'start_date',
        ];
        $propertyLabels = [
            'vendor' => '事業者',
            'approved' => '許可対象',
            'prefecture' => '都道府県',
            'business_area' => '許可地域',
            'end_date' => '有効期限',
            'health_center' => '申請先',
            'start_date' => '許可開始',
        ];
        $propertyValues = [
            'vendor' => $this->getVendor(),
            'approved' => $this->getApproved(),
            'prefecture' => $this->getPrefecture(),
        ];

        $this->properties = new Properties($this->entity, compact(
            'id', 'header', 'properties', 'propertyLabels',
            'propertyValues'
        ));
    }

    protected function getPermission()
    {
        $string = $this->entity->getBusinessCategory()->getLabel();

        return '<i class="fa fa-file-text text-muted"></i> ' . e($string);
    }

    protected function getVendor()
    {
        $vendor = $this->entity->getVendor();
        $id = $vendor->getId();
        $url = route('admin.vendors.show', compact('id'));

        return sprintf('<a class="text-muted" href="%s">%s</a>', e($url), e($vendor->getName()));
    }

    protected function getApproved()
    {
        $approved = $this->entity->getApproved();
        $string = $approved->getName();

        $approvedType = $this->entity->getApprovedType();
        if ($approvedType->getLabel()) {
            $string = "({$approvedType}) " . $string;
        }

        $string = e($string);

        if ($approvedType->getValue() === 'car') {
            $id = $approved->getId();
            $url = route('admin.cars.show', compact('id'));

            $string = sprintf('<a class="text-muted" href="%s">%s</a>', e($url), $string);
        }

        return $string;
    }

    protected function getPrefecture()
    {
        return $this->entity->getBusinessArea()->getPrefecture();
    }
}
