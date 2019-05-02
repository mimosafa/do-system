<?php

namespace Wstd\Equipment\View\Models\Admin;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;

/**
 * @see resources/views/admin/templates/index.blade.php
 * @see resources/views/admin/includes/indexTable.blade.php
 */
abstract class AbstractIndexViewModel extends ViewModel
{
    /**
     * Table タグのID などに使用、必須
     * 例) users
     *
     * @var string
     */
    public $nameOfIndexed;

    /**
     * タイトルや見出しに使用、必須
     * 例) ユーザー
     *
     * @var string
     */
    public $labelOfIndexed;

    /**
     * ソートとかができる "DataTable" にするか否か
     *
     * @var bool
     */
    public $isDataTable = false;

    /**
     * テーブル項目 例) ['id', 'name', 'email']
     * など、そのエンティティーのプロパティとなる文字が適当
     *
     * @var array
     */
    public $itemsOfIndexed;

    /**
     * 上記テーブル項目の表示ラベル
     * 例) ['id'=>'ID','name'=>'名前','email'=>'メアド']
     *
     * @var array
     */
    public $itemLabelsOfIndexed;

    /**
     * インデックス表示するアイテムを取得する関数、必須
     */
    abstract public function list();

    /**
     * Thタグ (テーブルの見出し)の Attributes を返す
     *
     * @access public
     *
     * @param string $item
     * @return string
     */
    public function thAttributesCallback(string $item): string
    {
        $attr = '';
        if ($classes = $this->thClassesCallback($item)) {
            $attr .= 'class="' . implode(' ', $classes) . '" ';
        }

        return $attr;
    }

    /**
     * Th タグの class を配列で返す
     * ** 継承先クラスで上書き推奨 **
     *
     * @param string $item
     * @return array
     */
    protected function thClassesCallback(string $item)
    {
        return [];
    }

    /**
     * Trタグ (テーブルの「行」)の Attributes を返す
     *
     * @access public
     *
     * @param mixed $model
     * @return string
     */
    public function trAttributesCallback($model): string
    {
        $attr  = '';
        if ($classes = $this->trClassesCallback($model)) {
            $attr .= 'class="' . implode(' ', $classes) . '" ';
        }

        return $attr;
    }

    /**
     * Tr タグの class を配列で返す
     * ** 継承先クラスで上書き推奨 **
     *
     * @param mixed $model
     * @return array
     */
    protected function trClassesCallback($model): array
    {
        return [];
    }

    /**
     * Tdタグの Attributes を返す
     *
     * @access public
     *
     * @param string $item
     * @param mixed $model
     * @return string
     */
    public function tdAttributeCallback(string $item, $model): string
    {
        $attr = '';
        if ($classes = $this->tdClassesCallback($item, $model)) {
            $attr .= 'class="' . implode(' ', $classes) . '"';
        }

        return $attr;
    }

    /**
     * Td タグの class を配列で返す
     * ** 継承先クラスで上書き推奨 **
     *
     * @param string $item
     * @param mixed $model
     * @return array
     */
    protected function tdClassesCallback(string $item, $model): array
    {
        return [];
    }

    /**
     * ヘルパー関数 Str::camel のラッパー
     *
     * @param string $string
     * @return string
     */
    public function strCamelCase(string $string)
    {
        return Str::camel($string);
    }
}
