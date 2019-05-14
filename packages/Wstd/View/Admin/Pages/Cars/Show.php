<?php

namespace Wstd\View\Admin\Pages\Cars;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\Car\Car;
use Wstd\View\Admin\ViewModelInterface;

final class Show extends ViewModel implements ViewModelInterface
{
    /**
     * @var Wstd\Domain\Models\Car\Car
     */
    private $entity;

    /**
     * @var string
     */
    public $title = '車両詳細';

    /**
     * @var string Blade template
     */
    private $template = 'adminWstd.pages.cars.show';

    /**
     * 車両基本情報BOX
     *
     * @var Wstd\View\Admin\Pages\Cars\DefaultInformation
     */
    public $defaultInformation;

    /**
     * 車両写真
     *
     * @var array
     */
     public $images = [];

    /**
     * @var array
     */
    protected $ignore = ['__construct', 'template'];

    public function __construct(Car $entity)
    {
        $this->entity = $entity;
        $this->defaultInformation = new DefaultInformation($entity);
        $this->initImages();
    }

    private function initImages()
    {
        //
    }

    public function template(): string
    {
        return $this->template;
    }
}
