<?php

namespace Wstd\View\Models\Admin;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\EntityInterface;
use Wstd\View\Models\Admin\Traits\UtilityTrait;

abstract class AbstractShowViewModel extends ViewModel
{
    use UtilityTrait;

    /**
     * @var Wstd\Domain\Models\EntityInterface;
     */
    public $entity;

    /**
     * html タグの attribute などに使用、必須
     * 例) user
     *
     * @var string
     */
    public $nameOfEntity;

    /**
     * タイトルや見出しに使用、必須
     * 例) ユーザー
     *
     * @var string
     */
    public $labelOfEntity;

    /**
     * 基本情報ボックスの ViewModel
     * 表示するのであれば、Constructor を上書きして然るべきオブジェクトを代入すること
     *
     * @var Wstd\View\Models\Admin\Includes\AbstractDefaultInformation
     */
    public $defaultInformation;

    /**
     * Constructor
     *
     * @param Wstd\Domain\Models\EntityInterface
     * @return void
     */
    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
    }

    /**
     * この entity が編集可能か否か
     *
     * @param string|null $context
     * @return bool
     */
    public function isEditable(?string $context = null): bool
    {
        if ($context) {
            $callback = 'isEditable' . $this->strCamelCase($context);
            if (method_exists(\get_called_class(), $callback)) {
                return $callback();
            }
            else {
                throw new \BadMethodCallException("No method constant '$callback' in class " . \get_called_class());
            }
        }
        return $this->entity->isEditable();
    }
}
