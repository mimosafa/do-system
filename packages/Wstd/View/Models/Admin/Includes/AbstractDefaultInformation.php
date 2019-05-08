<?php

namespace Wstd\View\Models\Admin\Includes;

use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Equipment\View\Models\Traits\UtilityTrait;
use Wstd\View\Models\Admin\Components\Forms\FormInterface;
use Wstd\View\Models\Admin\Components\Forms\InputText;

/**
 * @see
 *
 * @property Wstd\Domain\Models\EntityInterface $entity
 * @property array $items
 * @property array $itemLabels
 * @property array $editableItems
 *
 * @method string nameOfEntity()
 * @method bool isEditable(?string $property)
 * @method string idCallback()
 * @method string nameCallback()
 *
 * @see Wstd\Equipment\View\Traits\UtilityTrait
 * @method string strCamelCase(string $string)
 */
abstract class AbstractDefaultInformation extends ViewModel
{
    use UtilityTrait;

    /**
     * @var Wstd\Domain\Models\EntityInterface
     */
    protected $entity;

    /**
     * 表示する項目
     * 内容を表示する関数名に使用するので
     * (camelCaseしたら)関数名フレンドリーな文字列
     *
     * @var array
     */
    public $items = [
        'id',
        // 'name',
    ];

    /**
     * 表示する項目のラベル
     *
     * @var array
     */
    public $itemLabels = [
        'id' => 'ID',
        // 'name' => '名前',
    ];

    /**
     * 編集可能な項目
     *
     * @var array
     */
    public $editableItems = [
        'name',
    ];

    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
    }

    /**
     * html タグの attribute などに使用する文字列
     *
     * @return string
     */
    public function nameOfEntity(): string
    {
        return Str::slug(
            \class_basename(\get_class($this->entity))
        );
    }

    /**
     * 引数のプロパティ、あるいは編集可能な
     * すべてのプロパティが編集できるか否か
     *
     * @todo 未実装
     *
     * @param string $property
     * @return bool
     */
    public function isEditable(?string $property = null): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function headerCallback(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function idCallback(): string
    {
        return (string) $this->entity->getId();
    }

    /**
     * @return string
     */
    public function nameCallback(): string
    {
        return $this->entity->getName();
    }

    /**
     * @return Wstd\View\Models\Admin\Components\Forms\FormInterface
     */
    public function nameFormCallback(): FormInterface
    {
        return new InputText('name', $this->entity->getName(), $this->itemLabels['name']);
    }
}
