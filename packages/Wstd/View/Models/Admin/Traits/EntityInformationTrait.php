<?php

namespace Wstd\View\Models\Admin\Traits;

use Illuminate\Support\Str;
use Wstd\Domain\Models\EntityInterface;

trait EntityInformationTrait
{
    /**
     * @var Wstd\Domain\Models\EntityInterface
     */
    protected $entity;

    /**
     * Constructor
     *
     * @var Wstd\Domain\Models\EntityInterface $entity
     */
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
}
