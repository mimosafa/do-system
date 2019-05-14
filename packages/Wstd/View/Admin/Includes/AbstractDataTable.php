<?php

namespace Wstd\View\Admin\Includes;

use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;
use Wstd\View\Admin\Traits\UtilityTrait;

/**
 * @see
 */
abstract class AbstractDataTable extends ViewModel
{
    use UtilityTrait;

    /**
     * html タグのattributes などに使用
     * 例) users
     *
     * @var string
     */
    public $name;

    /**
     * タイトルや見出しに使用
     * 例) ユーザー
     *
     * @var string
     */
    public $label;

    /**
     * データがないときの表示
     *
     * @var string
     */
    public $emptyText;

    /**
     * ソートとかができる "DataTable" にするか否か
     *
     * @var bool
     */
    public $isDataTable;

    /**
     * テーブル項目 例) ['id', 'name', 'email']
     * など、そのエンティティーのプロパティとなる文字が適当
     *
     * @var array
     */
    public $items;

    /**
     * 上記テーブル項目の表示ラベル
     * 例) ['id'=>'ID','name'=>'名前','email'=>'メアド']
     *
     * @var array
     */
    public $itemLabels;

    /**
     * テーブルの内容
     *
     * @var Illuminate\Support\Collection
     */
    public $collection;

    /**
     * Blade template
     *
     * @var string
     */
    protected $template = 'adminWstd.includes.dataTable';

    /**
     * @var array
     */
    protected $ignore = ['__construct', 'template',];

    /**
     * データがないときの表示を返す
     *
     * ** Note **
     * エスケープせずに出力します。必ずreturn する前に適切な処理をすること
     *
     * @return string
     */
    public function emptyText(): string
    {
        $label = $this->label ?? $this->name;
        return e($label) . 'の登録がありません。';
    }

    /**
     * th タグの内容を表示
     *
     * ** Note **
     * エスケープせずに出力します。必ずreturn する前に適切な処理をすること
     *
     * @param string $item Content of static::$items
     * @return string
     */
    public function th(string $item): string
    {
        $th = $this->itemLabels[$item] ?? $item;
        return e($th);
    }

    /**
     * th タグの attribute を返す
     *
     * ** Note **
     * エスケープせずに出力します。必ずreturn する前に適切な処理をすること
     *
     * @param string $item Content of static::$items
     * @return string
     */
    public function thAttributes(string $item): string
    {
        $attr = '';
        if ($classes = $this->thClasses($item)) {
            $classesString = trim(implode(' ', $classes));
            $attr .= 'class="' . $classesString . '" ';
        }
        return ' ' . e(trim($attr));
    }

    /**
     * th タグの class を配列で返す
     * ** 継承先クラスで上書き推奨 **
     *
     * ** Note **
     * 場合によって、エスケープせずに出力します。必ずreturn する前に適切な処理をすること
     *
     * @param string $item Content of static::$items
     * @return array
     */
    protected function thClasses(string $item): array
    {
        return [];
    }

    /**
     * tr タグの attribute を返す
     *
     * ** Note **
     * エスケープせずに出力します。必ずreturn する前に適切な処理をすること
     *
     * @param mixed $value Content of static::$collection
     * @return string
     */
    public function trAttributes($value): string
    {
        $attr = '';
        if ($classes = $this->trClasses($value)) {
            $classesString = trim(implode(' ', $classes));
            $attr .= 'class="' . $classesString . '" ';
        }
        return ' ' . e(trim($attr));
    }

    /**
     * tr タグの class を配列で返す
     * ** 継承先クラスで上書き推奨 **
     *
     * ** Note **
     * 場合によって、エスケープせずに出力します。必ずreturn する前に適切な処理をすること
     *
     * @param mixed $value Content of static::$collection
     * @return array
     */
    protected function trClasses($value): array
    {
        return [];
    }

    /**
     * td タグの内容を表示
     * ** 継承先クラスで上書き推奨 **
     * ** または、td{StudyCaseItem}(mixed $value) method を定義する **
     *
     * ** Note **
     * エスケープせずに出力します。必ずreturn する前に適切な処理をすること
     *
     * @uses Wstd\View\Models\Admin\Traits\UtilityTrait::strCamelCase()
     *
     * @param string $item Content of static::$items
     * @param mixed $value Content of static::$collection
     * @return string
     */
    public function td(string $item, $value): string
    {
        $method = 'get' . $this->strCamel($item);
        if (\method_exists($value, $method)) {
            return e((string) $value->$method());
        }
        if (isset($value->$item)) {
            return e($value->$item);
        }
        return '';
    }

    /**
     * td タグの attribute を返す
     *
     * ** Note **
     * エスケープせずに出力します。必ずreturn する前に適切な処理をすること
     *
     * @param string $item Content of static::$items
     * @param mixed $value Content of static::$collection
     * @return string
     */
    public function tdAttributes($value): string
    {
        $attr = '';
        if ($classes = $this->tdClasses($value)) {
            $classesString = trim(implode(' ', $classes));
            $attr .= 'class="' . $classesString . '" ';
        }
        return ' ' . e(trim($attr));
    }

    /**
     * td タグの class を配列で返す
     * ** 継承先クラスで上書き推奨 **
     *
     * ** Note **
     * 場合によって、エスケープせずに出力します。必ずreturn する前に適切な処理をすること
     *
     * @param string $item Content of static::$items
     * @param mixed $value Content of static::$collection
     * @return array
     */
    protected function tdClasses($value): array
    {
        return [];
    }

    /**
     * この ViewModel を使用するBlade template を取得
     * ** 必要に応じてこの関数か、$bladeTemplate プロパティをOverwrite **
     *
     * @return string
     */
    public function template(): string
    {
        return $this->template;
    }
}
