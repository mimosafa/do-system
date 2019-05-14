<?php

namespace Wstd\View\Admin\Modules\FormItems;

use Spatie\ViewModels\ViewModel;
use Wstd\View\Admin\Traits\UtilityTrait;

class Select extends ViewModel implements FormItemInterface
{
    use UtilityTrait;

    /**
     * @var string
     */
    public $name;

    /**
     * <select>の<option>要素
     *
     * インデックス配列の場合は値とラベルは同一
     * 例) ['male','female','other']
     *
     * 連想配列の場合は配列のキーがラベル、バリューが値になる
     * 例) ['男性' => 'male', '女性' => 'female', 'その他' => 'other']
     *
     * @var array
     */
    public $options;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $value;

    /**
     * @var string
     */
    public $label;

    /**
     * @var string Blade template
     */
    protected $template = 'adminWstd.modules.formItems.select';

    public function __construct(string $name, array $options, $args = [])
    {
        $this->name = $name;
        $this->options = $this->parseOptions($options);
        $this->id = $args['id'] ?? $this->name;
        $this->value = $args['value'] ?? null;
        $this->label = $args['label'] ?? $this->strTitle($this->name);
    }

    protected function parseOptions(array $options)
    {
        if ($options === array_values($options)) {
            return $this->options = array_combine($options, $options);
        }
        return $this->options = $options;
    }

    public function template(): string
    {
        return $this->template;
    }
}
