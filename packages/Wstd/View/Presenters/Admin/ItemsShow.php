<?php

namespace Wstd\View\Presenters\Admin;

use Wstd\Domain\Models\Item\ItemInterface;
use Wstd\View\Html\Admin\FormFactory;
use Wstd\View\Presenters\IdentifiedPresenter;
use Wstd\View\Presenters\Admin\Modules\Content;
use Wstd\View\Presenters\Admin\Modules\Contents;
use Wstd\View\Presenters\Admin\Modules\FormContainer;
use Wstd\View\Presenters\Admin\Modules\Gallery;
use Wstd\View\Presenters\Admin\Modules\Section;
use Wstd\View\Presenters\Admin\Modules\Sections;
use Wstd\View\Presenters\Admin\Templates\Properties;

class ItemsShow extends IdentifiedPresenter
{
    protected $entity;

    public $id = 'item';

    public $title = '商品詳細';

    /**
     * @var Wstd\View\Presenters\Admin\Templates\Properties
     */
    public $properties;

    public $shops;

    /**
     * @var Wstd\View\Presenters\Admin\Modules\Contents
     */
    public $contents;

    public function __construct(ItemInterface $entity)
    {
        $this->entity = $entity;
        $this->initProperties();
        $this->initShops();
        $this->initContents();
    }

    protected function initProperties()
    {
        $id = $this->id . '_properties';
        $header = '<i class="fa fa-fw fa-cutlery "></i> ' . e($this->entity->getName());
        $properties = ['vendor', 'status',];
        $propertyLabels = ['vendor' => '事業者',];
        $propertyValues = ['vendor' => $this->vendorPropertyValue(),];
        $editableProperties = ['name', 'status',];

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

    protected function initShops()
    {
        $shops = $this->entity->getShops();
        $content = '';
        if ($shops->isNotEmpty()) {
            $array = [];
            foreach ($shops as $shop) {
                $array[] = sprintf(
                    '<a href="%s">%s</a>',
                    route('admin.shops.show', ['id' => e($shop->getId()),]),
                    e($shop->getName())
                );
            }
            $content .= implode(' <span class="text-muted">/</span> ', $array);
        }
        else {
            $content .= '<span class="text-muted">None</span>';
        }

        $this->shops = new Contents(
            new Content($content, [
                'id' => 'handling_shops',
                'title' => '<i class="fa fa-coffee"></i> 取扱店舗',
            ]), [
                'boxContext' => 'primary',
            ]
        );
    }

    protected function initContents()
    {
        $contents = [
            $this->initGallery(),
            $this->initTexts(),
        ];

        $this->contents = new Contents($contents);
    }

    protected function initGallery()
    {
        $images = $this->entity->getPhotos();
        $id = 'food_images';
        $title = '<i class="fa fa-camera"></i> 商品画像';
        $addable = true;
        $sortable = true;
        $removal = true;
        /**
         * @see Wstd\Application\Requests\ItemRequest
         */
        $nameForAdd = 'food_photo';
        $nameForSort = 'food_photos';
        $nameForRemove = 'remove_food_photos';

        return new Gallery($images, compact(
            'id', 'title', 'addable', 'sortable', 'removal',
            'nameForAdd', 'nameForSort', 'nameForRemove'
        ));
    }

    protected function initTexts()
    {
        $copy = new Section($this->entity->getCopy(), [
            'header' => '商品コピー',
        ]);
        $description = new Section($this->entity->getDescription(), [
            'header' => '商品説明',
        ]);

        $texts = new Sections([
            $copy, $description,
        ]);

        return new Content($texts, [
            'id' => 'food_desc',
            'title' => '<i class="fa fa-comments"></i> 商品説明',
            'form' => $this->initTextsForm(),
        ]);
    }

    protected function initTextsForm()
    {
        $forms = [
            FormFactory::makeInputText([
                'name' => 'copy',
                'label' => '商品コピー',
                'maxLength' => 30,
                'value' => $this->entity->getCopy(),
            ]),
            FormFactory::makeInputText([
                'name' => 'description',
                'label' => '商品説明',
                'maxLength' => 80,
                'value' => $this->entity->getDescription(),
            ]),
        ];

        return new FormContainer($forms, [
            'id' => 'edit_texts',
            'title' => '商品説明を編集する',
        ]);
    }
}
