<?php

namespace Wstd\View\Admin\Includes;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\ValueObjectInterface;
use Wstd\View\Admin\FormItemFactory;
use Wstd\View\Admin\Includes\FormItemContainer;
use Wstd\View\Admin\Modules\FormItems\FormItemInterface;
use Wstd\View\Admin\Traits\UtilityTrait;

/**
 * @see resources/view/adminWstd/includes/defaultInformation.blade.php
 */
abstract class AbstractDefaultInformation extends ViewModel
{
    use UtilityTrait;

    /**
     * @var Wstd\Domain\Models\EntityInterface
     */
    protected $entity;

    /**
     * @var string
     */
    public $name;

    /**
     * 基本情報BOX に表示する項目
     * 例) ['id', 'status',]
     *
     * @var array
     */
    public $items = [];

    /**
     * 基本情報BOX に表示する項目のラベル
     * 例) ['id' => 'ID', 'name' => '名前', 'status' => '状態']
     *
     * @var array
     */
    public $itemLabels = [];

    /**
     * 編集を許可する項目
     * 例) ['name', 'status',]
     *
     * @var array
     */
    protected $itemEditables = [];

    /**
     * @var Wstd\View\Admin\Contents\FormItemContainer
     */
    public $formItemContainer;

    /**
     * @var string Blade template
     */
    protected $template = 'adminWstd.includes.defaultInformation';

    /**
     * @var array
     */
    protected $ignore = ['__construct', 'template'];

    /**
     * @param Wstd\Domain\Models\EntityInterface
     */
    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
        $this->name = $this->strSnake(\class_basename($this->entity));
        if (! empty($this->itemEditables)) {
            $this->initFormItemContainer();
        }
    }

    protected function initFormItemContainer()
    {
        $this->formItemContainer = new FormItemContainer();
        foreach ($this->itemEditables as $item) {
            $method = $this->strCamel($item) . 'FormItem';
            $formItem = \method_exists($this, $method) ? $this->$method() : $this->formItemFactory($item);
            $this->formItemContainer->add($formItem);
        }
    }

    /**
     * 基本情報BOX のヘッダー部分
     * 必要ない場合は空文字('') を返す
     *
     * @return string
     */
    public function header(): string
    {
        return '';
    }

    /**
     * 項目に対する値を表示。継承先のClass で上書きをするか、
     * {itemCamelCase}Content() メソッドを定義すれば
     * 表示をカスタマイズできます。
     * @see resouces/view/adminWstd/includes/defaultInformation.blade.php
     *
     * ** Note **
     * エスケープせずに出力します。
     * return する前に適切な処理をしてください。
     *
     * @param string $item member of static::$items
     * @return string
     */
    public function content(string $item): string
    {
        return (string) $this->getValueObject($item);
    }

    public function getValueObject(string $item)
    {
        $method = 'get' . $this->strStudly($item);
        return \method_exists($this->entity, $method) ? $this->entity->$method() : null;
    }

    /**
     * @todo
     * 項目編集用のForm item view model を作る
     *
     * @param string $item
     * @return Wstd\View\Admin\Modules\FormItems\FormItemInterface
     */
    protected function formItemFactory(string $item): FormItemInterface
    {
        $vo = $this->getValueObject($item);
        if ($vo instanceof ValueObjectInterface) {
            return FormItemFactory::makeFromValueObject($vo, [
                'name' => $item,
                'label' => $this->itemLabels[$item] ?? '',
            ]);
        }
        return FormItemFactory::makeInputText($item, [
            'label' => $this->itemLabels[$item] ?? $this->strTitle($item),
            'value' => $this->content($item),
        ]);
    }

    /**
     * @return string Blade template
     */
    public function template(): string
    {
        return $this->template;
    }
}
