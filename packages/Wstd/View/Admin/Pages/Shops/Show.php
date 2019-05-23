<?php

namespace Wstd\View\Admin\Pages\Shops;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\Shop\Shop;
use Wstd\View\Admin\ViewModelInterface;

final class Show extends ViewModel implements ViewModelInterface
{
    /**
     * @var Wstd\Domain\Models\Shop\Shop
     */
    private $entity;

    /**
     * @var string
     */
    public $title = '店舗詳細';

    /**
     * @var string Blade template
     */
    private $template = 'adminWstd.pages.shops.show';

    /**
     * 店舗基本情報BOX
     *
     * @var Wstd\View\Admin\Pages\Shops\DefaultInformation
     */
    public $defaultInformation;

    /**
     * @var array
     */
    protected $ignore = ['__construct', 'template'];

    public function __construct(Shop $entity)
    {
        $this->entity = $entity;
        $this->defaultInformation = new DefaultInformation($entity);
    }

    public function template(): string
    {
        return $this->template;
    }
}
