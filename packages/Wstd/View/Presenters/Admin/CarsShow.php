<?php

namespace Wstd\View\Presenters\Admin;

use AdministrationJa\FoodBusinessCategories;
use AdministrationJa\Prefectures;
use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\IdentifiedPresenter;
use Wstd\View\Presenters\Admin\Includes\TableForBrands;
use Wstd\View\Presenters\Admin\Includes\TableForBusinessPermits;
use Wstd\View\Presenters\Admin\Modules\Contents;
use Wstd\View\Presenters\Admin\Modules\FormContainer;
use Wstd\View\Presenters\Admin\Modules\Gallery;
use Wstd\View\Presenters\Admin\Templates\Belongs;
use Wstd\View\Presenters\Admin\Templates\Properties;

class CarsShow extends IdentifiedPresenter
{
    /**
     * @var Wstd\Domain\Models\EntityInterface
     */
    protected $entity;

    /**
     * @var string
     */
    public $id = 'car';

    /**
     * @var string
     */
    public $title = '車両詳細';

    /**
     * @var Wstd\View\Presenters\Admin\Templates\Properties
     */
    public $properties;

    /**
     * @var Wstd\View\Presenters\Admin\Modules\Contents
     */
    public $contents;

    private $availableBrandsCollection;
    public $availableBrands;

    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
        $this->availableBrandsCollection = $entity->getAvailableBrands();
        $this->initProperties();
        $this->initContents();
        $this->initAvailableBrands();
    }

    protected function initProperties()
    {
        $id = $this->id . '_properties';
        $header = '<i class="fa fa-car text-muted"></i> ' . e($this->entity->getName());
        $properties = ['vendor', 'vin', 'status',];
        $propertyLabels = ['vendor' => '事業者',];
        $propertyValues = ['vendor' => $this->vendorPropertyValue(),];
        $editableProperties = ['name', 'vin', 'status',];

        $this->properties = new Properties($this->entity, compact(
            'id', 'header', 'properties', 'propertyLabels',
            'propertyValues', 'editableProperties'
        ));
    }

    protected function vendorPropertyValue()
    {
        $vendor = $this->entity->getVendor();
        $name = $vendor->getName();
        $link = route('admin.vendors.show', ['id' => $vendor->getId()]);

        return sprintf('<a href="%s">%s</a>', $link, '<i class="fa fa-user"></i> ' . e($name));
    }

    protected function initContents()
    {
        $contents = [
            $this->initGallery(),
            $this->initBusinessPermits(),
        ];

        $this->contents = new Contents($contents);
    }

    protected function initGallery()
    {
        $images = $this->entity->getPhotos();
        $id = 'car_images';
        $title = '<i class="fa fa-camera"></i> 車両画像';
        $addable = true;
        $sortable = true;
        $removal = true;
        /**
         * @see Wstd\Application\Requests\CarRequest
         */
        $nameForAdd = 'car_photo';
        $nameForSort = 'car_photos';
        $nameForRemove = 'remove_car_photos';

        return new Gallery($images, compact(
            'id', 'title', 'addable', 'sortable', 'removal',
            'nameForAdd', 'nameForSort', 'nameForRemove'
        ));
    }

    protected function initBusinessPermits()
    {
        $items = [
            'permission',
            'business_area',
            'health_center',
            'end_date',
        ];

        $table = new TableForBusinessPermits(
            $this->entity->getBusinessPermits(),
            compact('items')
        );

        return new Belongs($table, [
            'id' => 'car_business_permits',
            'title' => '<i class="fa fa-file-text"></i> 営業許可',
            'exchangable' => true,
            'exchangeForm' => $this->initBusinessPermitForm(),
            'exchangeText' => '営業許可証を追加する',
        ]);
    }

    protected function initBusinessPermitForm()
    {
        $formItems = [
            $this->prefecturesSelect(),
            $this->healthCentersSelect(),
            $this->businessCategoriesSelect(),
            $this->dateInputStart(),
            $this->dateInputEnd(),

            FormFactory::makeInputHidden([
                'name' => 'car_id',
                'value' => $this->entity->getId(),
            ]),
        ];

        return new FormContainer($formItems, [
            'id' => 'car_business_permits_form',
            'action' => route('admin.businessPermits.store'),
        ]);
    }

    protected function prefecturesSelect()
    {
        $db = new Prefectures();
        $prefs = $db->getAll();

        $options = [];
        $options[0] = '(都道府県選択)';

        foreach ($prefs as $array) {
            $options[$array['prefecture_id']] = $array['prefecture_name'];
        }

        $label = '都道府県';
        $class = 'select-prefecture';

        return FormFactory::makeSelect($options, compact(
            'label', 'class'
        ));
    }

    protected function healthCentersSelect()
    {
        $options = [];
        $options[0] = '-';

        $name = 'health_center_id';
        $label = '保健所';
        $class = 'select-health-center';

        return FormFactory::makeSelect($options, compact(
            'name', 'label', 'class'
        ));
    }

    protected function businessCategoriesSelect()
    {
        $db = new FoodBusinessCategories();

        $options = $db->getKeyValues();
        $options = [0 => '-'] + $options;

        $name = 'business_category';
        $label = '食品営業の種類';
        $class = 'select-business-category';

        return FormFactory::makeSelect($options, compact(
            'name', 'label', 'class'
        ));
    }

    protected function dateInputStart()
    {
        $label = FormFactory::makeLabel([
            'for' => 'start_date',
        ]);
        $label = $label->text('許可開始日');

        $input = FormFactory::makeInputDate([
            'name' => 'start_date',
            'id' => 'start_date',
            'class' => 'form-control',
        ]);

        return FormFactory::makeFormGroup($label, $input);
    }

    protected function dateInputEnd()
    {
        $label = FormFactory::makeLabel([
            'for' => 'end_date',
        ]);
        $label = $label->text('許可終了日');

        $input = FormFactory::makeInputDate([
            'name' => 'end_date',
            'id' => 'end_date',
            'class' => 'form-control',
        ]);

        return FormFactory::makeFormGroup($label, $input);
    }

    protected function initAvailableBrands()
    {
        $table = new TableForBrands($this->availableBrandsCollection, [
            'items' => [
                'thumb', 'name',
            ],
        ]);

        $this->availableBrands = new Contents(
            new Belongs($table, [
                'id' => 'car_available_brands',
                'title' => '<i class="fa fa-fw fa-coffee "></i> 取扱いブランド',
                'exchangable' => true,
                'exchangeForm' => $this->initAvailableBrandsForm(),
                'exchangeText' => '取扱いブランドを変更する',
            ]), [
                'boxContext' => 'primary',
            ]
        );
    }

    protected function initAvailableBrandsForm()
    {
        $vendorBrands = $this->entity->getVendor()->getBrands();

        $options = [];
        foreach ($vendorBrands as $vendorBrand) {
            $options[$vendorBrand->getId()] = $vendorBrand->getName();
        }

        $values = [];
        foreach ($this->availableBrandsCollection as $brand) {
            $values[] = $brand->getId();
        }

        $forms = [
            FormFactory::makeSelect($options, [
                'name' => 'available_brands',
                'multiple' => true,
                'label' => '取扱いブランド',
                'value' => $values,
                'select2' => true,
            ])
        ];

        if (! empty($values)) {
            $forms[] = FormFactory::makeInputHidden([
                'name' => 'detach_available_brands',
                'value' => 1,
            ]);
        }

        $id = 'edit_available_brands';
        $title = $toggle = '取扱いブランドを変更する';

        return new FormContainer($forms, compact('id', 'title', 'toggle'));
    }
}
