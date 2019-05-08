<?php

namespace Wstd\Domain\Models;

interface EntityInterface
{
    /**
     * エンティティーのID を取得
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * エンティティーの名前を取得
     *
     * @return string
     */
    public function getName(): string;

    /**
     * エンティティーが編集可能か否か
     *
     * @param string|null $property
     * @return bool
     */
    public function isEditable(?string $property): bool;
}
