<?php

namespace Wstd\Equipment\View\Models\Admin;

use Spatie\ViewModels\ViewModel;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Equipment\View\Models\Traits\UtilityTrait;

abstract class AbstractShowViewModel extends ViewModel
{
    use UtilityTrait;

    /**
     * @var Wstd\Domain\Models\EntityInterface;
     */
    public $model;

    /**
     * html タグの attribute などに使用、必須
     * 例) user
     *
     * @var string
     */
    public $nameOfModel;

    /**
     * タイトルや見出しに使用、必須
     * 例) ユーザー
     *
     * @var string
     */
    public $labelOfModel;

    /**
     * 基本情報BOX に表示する項目
     * 内容を表示する関数名に使用するので(camelCaseしたら)関数名フレンドリーな文字列
     * bool値 false の場合は基本情報BOXを表示しない
     *
     * @var array[string]|bool
     */
    public $defaultInformations = [
        // 'id',
        // 'status',
    ];

    /**
     * 基本情報BOX に表示する項目のラベル
     *
     * @var array
     */
    public $defaultInformationLabels = [
        // 'id' => 'ID',
        // 'status' => '状態',
    ];

    /**
     * Constructor
     *
     * @param Wstd\Domain\Models\EntityInterface
     * @return void
     */
    public function __construct(EntityInterface $model)
    {
        $this->model = $model;
    }

    /**
     * 基本情報BOX のヘッダー部分に表示する内容
     * デフォルトはモデルの名前を表示
     * 必要に応じて関数を上書きすること
     *
     * @return string
     */
    public function defaultInformationHeader(): string
    {
        return $this->model->getName();
    }

    /**
     * 基本情報BOX のヘッダー部分に表示する内容のラベル
     * デフォルトは`$labelOfModel` + '名'
     * 必要に応じて関数を上書きすること
     *
     * @return string
     */
    public function defaultInformationHeaderLabel(): string
    {
        return $this->labelOfModel ? $this->labelOfModel . '名' : '';
    }

    /**
     * この model が編集可能か否か
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
        return $this->model->isEditable();
    }
}
