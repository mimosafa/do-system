<?php

namespace Wstd\View\Admin\Pages\Cars;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\Car\Car;
use Wstd\View\Admin\ViewModelInterface;

final class Show extends ViewModel implements ViewModelInterface
{
    /**
     * @var string
     */
    public $title = '車両詳細';

    /**
     * @var string Blade template
     */
    private $template = 'adminWstd.pages.cars.show';

    /**
     * @var Wstd\View\Admin\Pages\Cars\DefaultInformation
     */
    public $defaultInformation;

    /**
     * @var array
     */
    protected $ignore = ['__construct', 'template'];

    public function __construct(Car $entity)
    {
        $this->defaultInformation = new DefaultInformation($entity);
    }

    public function template(): string
    {
        return $this->template;
    }
}
