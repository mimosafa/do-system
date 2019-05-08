<?php

namespace Wstd\View\Models\Admin\Includes;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Models\Admin\Traits\EntityInformationTrait;
use Wstd\View\Models\Admin\Traits\UtilityTrait;
use Wstd\View\Models\Admin\Components\Forms\FormInterface;
use Wstd\View\Models\Admin\Components\Forms\InputText;

/**
 * @see resources/views/admin/includes/defaultInformation.blade.php
 *
 * @see Wstd\View\Models\Admin\Traits\EntityInformationTrait
 * @property protected Wstd\Domain\Models\EntityInterface $entity
 * @method string nameOfEntity()
 *
 * @property array $items
 * @property array $itemLabels
 * @property array $editableItems
 *
 * @method bool isEditable(?string $property)
 * @method string idCallback()
 * @method string nameCallback()
 * @method string {camelCaseProperty}Callback()
 * @method Wstd\View\Models\Admin\Components\Forms\FormInterface nameFormCallback()
 * @method Wstd\View\Models\Admin\Components\Forms\FormInterface {camelCaseProperty}FormCallback()
 *
 * @see Wstd\Equipment\View\Traits\UtilityTrait
 * @method string strCamelCase(string $string)
 */
abstract class AbstractDefaultInformation extends ViewModel
{
    use UtilityTrait;
    use EntityInformationTrait;

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
     * ヘッダー部分に表示する内容
     * 空文字の場合はヘッダーなし
     *
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
     * 編集用のフォームを司るオブジェクトを返却
     * 編集可能なプロパティについては要・定義
     *
     * @return Wstd\View\Models\Admin\Components\Forms\FormInterface
     */
    public function nameFormCallback(): FormInterface
    {
        return new InputText('name', $this->entity->getName(), $this->itemLabels['name']);
    }
}
