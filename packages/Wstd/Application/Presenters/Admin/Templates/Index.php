<?php

namespace Wstd\Application\Presenters\Admin\Templates;

use Illuminate\Support\Str;
use Wstd\Application\Presenters\Admin\Modules\Table;

abstract class Index extends Table
{
    /**
     * e.g. 'Users List'
     *
     * @var string
     */
    public $title;

    /**
     * Overwrite Table::td()
     *
     * @param string $item
     * @param Wstd\Domain\Models\EntityInterface $entity
     * @return string
     */
    public function td(string $item, $entity): string
    {
        $method = 'get' . Str::studly($item);
        if (method_exists($entity, $method)) {
            return e(strval($entity->{$method}()));
        }
        return $entity->{$item} ? e(strval($entity->{$item})) : '';
    }

    /**
     * Overwrite emptyMessage::td()
     *
     * @return string
     */
    public function emptyMessage(): string
    {
        return $this->title . ' Is Empty.';
    }
}
